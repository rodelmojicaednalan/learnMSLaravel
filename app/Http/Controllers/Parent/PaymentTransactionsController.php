<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ArtbugClass;
use App\Models\ClassEnrollee;
use App\Models\ClassSchedule;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use Zoom;

class PaymentTransactionsController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:parent']);
	}
    public function index()
    {
        $page_title = 'Payment Transactions';
        $page_description = '';

        return view('backend.parent.payment-transactions.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'payment-list':

                    $users = PaymentTransaction::where('user_id', Auth::user()->id)->get();

    				return json_encode($users);
    			break;

    		default:

    			break;
    	}
    }

    public function pricing(Request $request)
    {
        $data['page_title'] = 'Checkout';

        $class_id = $request->class_id;
        $total = 0;
        $subject = ArtbugClass::with('user' , 'subject')->where('id',$class_id)->first();

        if ($request->has('child')) {
            $data['child'] = $request->child;

            //Loop child id
            $child = auth()->user()->children()->whereIn('id', $request->child)->get();
            foreach ($child as $key => $value) {
                $middle_name = ($value->middlename) ? $value->middlename : '';
                $child_name = $value->firstname . ' ' . $middle_name . ' ' .  $value->lastname;

                $total += intval($subject->fee);
                $data['child'][$key] = [
                    'name' => $child_name,
                    'fee' => 'SGD ' . number_format($subject->fee, 2)
                ];
            }

            $data['total_fee'] = 'SGD ' . number_format($total, 2);
        }

        if(!empty($subject))
        {
            // dd($subject);
            if(!empty($subject->subject))
            {
                $data['subject'] = $subject;
                return view('backend.parent.payment.pricing')->with($data);

            }else
            {
                #invalid subject
                return redirect('parent/classes');
            }

        }else
        {
            return redirect('parent/classes');
        }

    }

    public function paymentSubmit(Request $request) {
        if(!$request->ajax()){
            return redirect("");
        }

        // Initialize Omnipay
        $gateway = Omnipay::create('Stripe\PaymentIntents');

        $gateway->initialize([
            'apiKey' => config('payment.stripe_secret'),
        ]);

        // Get Current User Details

        $email = auth()->user()->email;
        $name = auth()->user()->first_name . ' ' . auth()->user()->last_name;

        // Get Class Details
        $classes_object = ArtbugClass::find(request()->class_id);
        $class_fee = $classes_object->fee;
        $class_type = $classes_object->type;
        $readable_class_type = ucfirst($classes_object->type);

        $total = 0;

        if ($request->has('child_id')) {

            //Loop child id
            $child = auth()->user()->children()->whereIn('id', $request->child_id)->get();
            $child_names = array();
            foreach ($child as $key => $value) {
                $child_name =$value->firstname . ' ' . ($value->middlename) ? $value->middlename : '' . ' ' .  $value->lastname;
                $total += intval($class_fee);
                array_push($child_names, $child_name);
            }

            // Payment variables
            $response = $gateway->purchase(
                [
                    'amount' => $total,
                    'currency' => 'SGD',
                    'token' => request()->stripeToken,
                    'confirm' => true,
                    'returnUrl' => request()->return_url,
                    'metadata' => [
                        'name' => $name,
                        'email' => $email,
                        'child_names' => implode(', ', $child_names),
                        'payment_type' => $readable_class_type . ' Class',
                        'user_type' => 'Parent',
                        'subject_name' => request()->subject_name
                    ]
                ]
            )->send();

            if ($response->isSuccessful()) {

                $payment_details = $response->getData();

                $data = [
                    'class_id' => request()->class_id,
                    'transaction_id' => $payment_details['id'],
                    'transaction_type' => $class_type . '_class',
                    'transaction_type_readable_name' => $readable_class_type . ' Class',
                    'subject_name' => request()->subject_name,
                    'description' => $child_name . ' (' . $readable_class_type . ' Class) - ' . request()->subject_name,
                    'amount' => $total,
                    'user_id' => Auth::user()->id,
                    'user_email' => Auth::user()->email,
                    'user_first_name' => Auth::user()->first_name,
                    'user_last_name' => Auth::user()->last_name,
                    'payment_date' => now(),
                    'child' => $request->child_id,
                ];

                $update = $this->updateClassDetails($data);
                $payment_transactions = $this->updatePaymentTransactions($data);
                $add_participant = $this->addParticipant($data);

                return response()->json([
                    'success' => true,
                    'return_url' => request()->return_url,
                    'message' => 'Enrolled Successfully'
                ], 200);

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'Payment Error'
                ], 500);
            }
        }


    }

    public function addParticipant($data, $test = true) {
        if (!$test) {

            $training = ClassSchedule::where('class_id', $data['class_id'])->first();
            $get_meeting = Zoom::meeting()->find($training->meeting_id); //meeting_id on training schedule

            $registrant = $get_meeting->registrants()->create([
                'email' => $data['user_email'],
                'first_name' => $data['user_first_name'],
                'last_name' => $data['user_last_name'],
            ]);
        }

    }

    public function updatePaymentTransactions($data) {

        $update = PaymentTransaction::create($data);

        return $update;

    }

    public function updateClassDetails($data) {
        if (Auth::check()) {

            if(Auth::user()->hasRole('parent')) {

                foreach ($data['child'] as $key => $value) {
                    $enroll = ClassEnrollee::create([
                        'child_id' => $value,
                        'class_id' => $data['class_id'],
                        'user_id' =>  Auth::user()->id,
                        'status' => 0
                    ]);
                }

                return true;
            }
        }

        else{
            return false;
        }
    }


}
