<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

use App\Models\PaymentTransaction;

class PaymentTransactionsController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Payment Transactions';
        $page_description = '';

        return view('backend.administrator.payment-transactions.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
			case 'add_new_payment':
                  
				// print_r($request->all());exit;

                $fake_id = $request->fake_id;
  
                $payment_transaction = PaymentTransaction::where('id', $fake_id)->first();

				
				$validator = \Validator::make($request->all(), [
					'payment_date' => 'required',
					'description' => 'required',
					'amount' => 'required',
				]);
				
				if ($validator->fails())
				{
					return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
				}

                if(empty($payment_transaction)) 
                {   
                                
                    $insert_id = PaymentTransaction::create([
                        'payment_date' => $request->payment_date,
                        'description' => $request->description,
                        'amount' =>$request->amount,                        
                    ]);

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
				}
                else  
                {
                    $payment_transaction->payment_date = $request->payment_date;
                    $payment_transaction->description = $request->description;
                    $payment_transaction->amount = $request->amount;
                    
                    $payment_transaction->save();

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
                }

                break;

    	 	case 'list':

				$search = $request->all();
				$query = PaymentTransaction::query();

				if(isset($search['query']['generalSearch']))
				{

					$query->where(function ($query) use ($search) {
					$query->where('payment_date', 'LIKE',"%{$search['query']['generalSearch']}%") 
					->orWhere('amount', 'LIKE',"%{$search['query']['generalSearch']}%") 
					->orWhere('description', 'LIKE',"%{$search['query']['generalSearch']}%");
					});

				}

				$data = $query->get();
				

				return json_encode($data);
    			break;

			case 'load_single_payment':
    				$data = PaymentTransaction::where('id', $request->id)->first();
    				return json_encode($data);
    			break;
    		    		
    		default:
    			
    			break;
    	}
    }

}
