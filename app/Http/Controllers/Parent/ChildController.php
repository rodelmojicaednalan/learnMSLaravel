<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ArtbugClass;
use Illuminate\Http\Request;

use Response;

use Auth;

use App\Models\Child;
use App\Models\ClassEnrollee;
use phpDocumentor\Reflection\Types\Parent_;

class ChildController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth','role:parent']);
	}
    public function index()
    {
        $page_title = 'Child';
        $page_description = '';

        return view('backend.parent.child.index', compact('page_title', 'page_description'));
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
                        'parent_id' => Auth::user()->id,
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
                // $data = Child::where('parent_id', Auth::user()->id)->get();
                $data = auth()->user()->children;
				return json_encode($data);
    			break;

			case 'load_single_child':
    				$data = Child::where('id', $request->id)->first();
    				return json_encode($data);
    			break;

            case 'get_class_details' :

                return $this->getClassDetails($request);
                break;

    		default:

    			break;
    	}
    }

    public function getClassDetails($request) {
        $data['class'] = [];
        $data['child'] = [];
        $class = ArtbugClass::with('user', 'subject', 'schedule')->find($request->class_id);
        $enrolled = ClassEnrollee::where('user_id', auth()->user()->id)
                            ->where('class_id', $request->class_id)
                            ->pluck('child_id')
                            ->toArray();
        if(!is_null($class)){
            $data['class'] =  $class;
        }
        $child = auth()->user()->children()->whereNotIn('id', $enrolled)->get();
        if(!is_null($child)) {
            $data['child'] = $child;
        }
        return response()->json($data);
    }
}
