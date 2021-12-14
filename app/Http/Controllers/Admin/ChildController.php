<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;

use App\Models\Child;

class ChildController extends Controller
{

    public function __construct()
	{
        $this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Students';
        $page_description = '';

        return view('backend.administrator.child.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
			case 'add_new_child':
                  
				// print_r($request->all());exit;

                $fake_id = $request->fake_id;
  
                $child_obj = Child::where('id', $fake_id)->first();

				
				$validator = \Validator::make($request->all(), [
					'firstname' => 'required',
					'middlename' => 'required',
					'lastname' => 'required',
                    'birthdate' => 'required',
				]);
				
				if ($validator->fails())
				{
					return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
				}

                if(empty($child_obj)) 
                {   
                                
                    $insert_id = Child::create([
                        'parent_id' => "1",
                        'firstname' => $request->firstname,
                        'middlename' => $request->middlename,
                        'lastname' =>$request->lastname,        
                        'birthdate' =>$request->birthdate,                 
                    ]);

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
				}
                else  
                {
                    $child_obj->firstname = $request->firstname;
                    $child_obj->middlename = $request->middlename;
                    $child_obj->lastname = $request->lastname;
                    $child_obj->birthdate = $request->birthdate;
                    $child_obj->save();

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
                }

                break;

    	 	case 'list':

                $search = $request->all();

				$query = Child::with('parent');

				if(isset($search['query']['generalSearch']))
				{

					$query->where(function ($query) use ($search) {
					$query->where('firstname', 'LIKE',"%{$search['query']['generalSearch']}%") 
					->orWhere('middlename', 'LIKE',"%{$search['query']['generalSearch']}%") 
                    ->orWhere('birthdate', 'LIKE',"%{$search['query']['generalSearch']}%") 
					->orWhere('lastname', 'LIKE',"%{$search['query']['generalSearch']}%");
					});

				}

				$data = $query->get();

				return json_encode($data);
    			break;

			case 'load_single_child':
    				$data = Child::where('id', $request->id)->first();
    				return json_encode($data);
    			break;
    		    		
    		default:
    			
    			break;
    	}
    }
}
