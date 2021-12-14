<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;

use App\Models\Category;
use App\Models\Level;

class CategoriesController extends Controller
{
	public function __construct()
	{
	    $this->middleware(['auth','role:administrator']);
	}

    public function index()
    {
        $page_title = 'Categories';
        $page_description = '';

        return view('backend.administrator.categories.index', compact('page_title', 'page_description'));
        
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		     
				case 'add_new_subject':
                  

				if (Auth::check()) {
					
		
					if(Auth::user()->hasRole('administrator')){

						$subject_id = $request->subject_id;

						$subject_obj = Category::where('id', $subject_id)->first();

						$validator = \Validator::make($request->all(), [
						'subject' => 'required|unique:category',
						]);

						if ($validator->fails())
						{
							return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
						}

						if(empty($subject_obj)) 
						{   

							$insert_id = Category::create([
							'subject' => $request->subject, 
							'type' => "",  
							'category' => $request->subject,    
							'parent_id' => "0",        
							]);

							return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
						}
						else  
						{
							$subject_obj->subject = $request->subject;
							$subject_obj->fee = $request->fee;
							
							$subject_obj->save();

							return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
						}

				    }
				}else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}

				break;

				case 'add_new_child':

					if (Auth::check()) {
						
						// print_r($request->all());exit;
						if(Auth::user()->hasRole('administrator')){
	
							$subject_id = $request->subject_id;
	
							$subject_obj = Category::where('id', $subject_id)->first();
	
	
							$validator = \Validator::make($request->all(), [
							 'subject' => 'required|unique:category',
							]);
	
							if ($validator->fails())
							{
								return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
							}
	
							if(empty($subject_obj)) 
							{   
								$subject_obj = Category::where('id', $request->parent_id)->first();

								$insert_id = Category::create([
								'subject' => $request->subject, 
								'type' => "",  
								'category' => $subject_obj->category,    
								'parent_id' => $request->parent_id,        
								]);
	
								return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
							}
							else  
							{
								$subject_obj->subject = $request->subject;

								$subject_obj->save();
	
								return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
							}
	
						}
					}else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
	
					break;

				case 'btnSaveLevel':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator'))
						{
							$subject_id = $request->subject_id;

							$number_arr = json_decode($request->number_arr, true);
							$name_arr = json_decode($request->name_arr, true);
							$hrs_arr = json_decode($request->hrs_arr, true);
							$level_id_arr = json_decode($request->level_id_arr, true);

							for($x = 0; $x < sizeof($level_id_arr); $x++)
							{ 

								if($level_id_arr[$x] == 0)
								{

										$insert_level = Level::create([
										'subject_id' => $request->subject_id,   
										'number' => $number_arr[$x], 
										'name' => $name_arr[$x], 
										'hrs' => $hrs_arr[$x],                  
										]);

								}
								else 
								{

									$level_obj = Level::where('id', $level_id_arr[$x])->first();

									$level_obj->number = $number_arr[$x];
									$level_obj->name = $name_arr[$x];
									$level_obj->hrs = $hrs_arr[$x];
									$level_obj->save();

								}
								

							}

							return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=> 'none'));
						
						}
					}
					else
					{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;

                case 'subjects_list':
					if (Auth::check()) {
					if(Auth::user()->hasRole('administrator')){

						$search = $request->all();

						$query = Category::query();

					

						if(isset($search['query']['generalSearch']))
						{
		
							$query->where(function ($query) use ($search) {
							$query->where('subject', 'LIKE',"%{$search['query']['generalSearch']}%")  
							->orWhere('category', 'LIKE',"%{$search['query']['generalSearch']}%");
							});
		
						}

						$data = $query->get();

						for($x=0; $x < sizeof($data); $x++)
						{
							if($data[$x]->parent_id != "0")
							{
								$get_subject = Category::where('id', $data[$x]->parent_id)->first();
								$data[$x]->parent= $get_subject->subject;
							}
							else {
								$data[$x]->parent="No Parent";
							}
					
                          
						}
						
						return json_encode($data);
					}
				  }
				  else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
				break;


						

				case 'load_levels':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){
							// $data = Level::where('subject_id', $request->id)->get();
							// return json_encode($data);

							$subject = Category::where('id', $request->id)->with('level')->first(); ### Use first instead of get because you are only expecting 1 record
							
							$data['subject'] = $subject;							

							return view('backend.administrator.subjects.ajax.subject-levels')->with($data);
						}
				  	}
				  	else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;

				case 'add_new_level':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){

							$insert_level = Level::create([
								'subject_id' => $request->subject_id,   
								'number' => $request->level_number,   
								'name' => $request->level_name,   
								'hrs' => $request->level_hrs,   
							]);
							return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=> 'none'));
						}
				  	}
				  	else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;


				case 'update_level':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){

							// print_r($request->all());exit;

							$level_obj = Level::where('id', $request->update_level_id)->first();

							$level_obj->name = $request->update_level_name;
							$level_obj->hrs = $request->update_level_hrs;
							
							$level_obj->save();

							return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=> 'none'));
						}
				  	}
				  	else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;


				

				case 'load_single_subject':
				if (Auth::check()) {
					if(Auth::user()->hasRole('administrator')){
					$data = Category::where('id', $request->id)->first();
					return json_encode($data);
					}
				}
				 else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
				break;

				case 'load_parent':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){
						$data = Category::where('parent_id', "0")->get();
						return json_encode($data);
						}
					}
					 else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;

				
				case 'load_child':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){
						$data = Category::where('parent_id', $request->parent_id)->get();
						return json_encode($data);
						}
					}
					 else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;

				
    		default:
    			
    			break;
    	}
    }
}
