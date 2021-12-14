<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;
use Auth;
use App\Models\Programmes;
use App\Models\Classes;
use App\Models\LiveClassSchedule;
use App\Models\Category;
use App\Models\Level;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProgrammeController extends Controller
{

	public function __construct()
	{
	    $this->middleware(['auth','role:school_administrator']);
	}
    public function index()
    {
        $page_title = 'Programme';
        $page_description = '';

        $subjects = Category::orderBy('category')->get();
        $levels = Level::where('parent_id' , "0")->orderBy('group')->get();

        $school = Auth::user()->schoolAdmin;

        // $teacher = $school->teacher;

        // print_r($teacher[0]['full_name']);exit;

        
        
		$new_data = [];
        $new_data2 = [];
		$ctr=0;
	

		for($z=0; $z < sizeof($subjects); $z++)
		{
                $get_subject = Category::where('parent_id', $subjects[$z]->id)->first();

                if(empty($get_subject))
                {
                    $new_data[$ctr]['id'] = $subjects[$z]->id;
                    $new_data[$ctr]['subject'] = $subjects[$z]->subject;
                    $new_data[$ctr]['category'] = $subjects[$z]->category;
                    $ctr++;
                }

		}

        $ctr=0;

        for($g=0; $g < sizeof($levels); $g++)
		{
            
            $get_child = Level::where('parent_id', $levels[$g]->id)->get();
            $new_data2[$ctr]['id'] = $levels[$g]->id;
            $new_data2[$ctr]['level'] = $levels[$g]->level;
            $new_data2[$ctr]['group'] = $levels[$g]->group;
            $new_data2[$ctr]['child'] = $get_child;
            $ctr++;
                
		}

        // print_r($new_data2);exit;

        return view('backend.school.administrator.programme.index', compact('page_title', 'page_description'))->with('subjects', $new_data)->with('levels' , $new_data2)->with('teachers', $school->teacher);
    }

 

    public function ajax($section, Request $request)
    {
    	switch ($section) {

            case 'get_programme':
			   $data = Programmes::with('level' , 'categories')->get();
			 return json_encode($data);   
            break;

            case 'get_single_programme':
                $data = Programmes::with('level' , 'categories')->where('id' , $request->id)->first();
              return json_encode($data);   
             break;
            
            case 'add_programme':

                    //  print_r($request->all());exit;
                     $getid = $request->id;

                
					$prog_obj = Programmes::where('id', $getid)->first();

                    if(empty($prog_obj)) 
					{   

						$validator = \Validator::make($request->all(), [
							'title' => 'required|unique:programmes',
							]);
		
							if ($validator->fails())
							{
								return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
							}

                            if ($request->hasFile('get_file')) {
                        

                                $image = $request->file('get_file');
                                $full_name = $image->getClientOriginalName();
                                $filename = pathinfo($full_name, PATHINFO_FILENAME);
                                $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                                $ranstr = sha1(time());
                                
                                $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();
    
                                $exists = Storage::disk('local')->has('uploads/school/programme/image/');
            
                                $filePath = 'uploads/school/programme/image/' . $new_name;
            
                                if (!$exists) {
                                    Storage::disk('public')->makeDirectory('uploads/school/programme/image/');
                                }
            
                                Storage::disk('public')->put($filePath, file_get_contents($image));
        
                            }
                            else {
                                $new_name = "";
                            }

                            $insert_id = Programmes::create([
                                'user_id' => Auth::id(),   
                                'cover_photo' => $new_name,   
                                'title' => $request->title, 
                                'description' => $request->description,  
                                'categories_id' => $request->category,  
                                'level_id' => $request->level,    
                                'price' => $request->price,    
                            ]);

						return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
					}
                    else
                    {
                            if($request->old_title != $request->title)
                            {
                         
                            $validator = \Validator::make($request->all(), [
                                'title' => 'required|unique:programmes',
                                ]);
            
                                if ($validator->fails())
                                {
                                    return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
                                }

                            }
                            else {
                                $validator =  \Validator::make($request->all(), [
                                 ]);
                            }

                            if ($request->hasFile('get_file')) {


                                $image = $request->file('get_file');
                                $full_name = $image->getClientOriginalName();
                                $filename = pathinfo($full_name, PATHINFO_FILENAME);
                                $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                                $ranstr = sha1(time());
                                
                                $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();
    
                                $exists = Storage::disk('local')->has('uploads/school/programme/image/');
            
                                $filePath = 'uploads/school/programme/image/' . $new_name;
            
                                if (!$exists) {
                                    Storage::disk('public')->makeDirectory('uploads/school/programme/image/');
                                }
    
                                $delete_exist = Storage::disk('public')->has('uploads/school/programme/image/'.$request->old_img);
    
                                if($delete_exist)
                                {
                                    Storage::disk('public')->delete('uploads/school/programme/image/'.$request->old_img);
                                }
            
                                Storage::disk('public')->put($filePath, file_get_contents($image));
        
                            }
                            else {
                                $new_name = "";
                            }

   
                            $prog_obj->cover_photo = $new_name;
                            $prog_obj->categories_id = $request->category;	
							$prog_obj->title = $request->title;	
                            $prog_obj->description = $request->description;	
                            $prog_obj->level_id = $request->level;
							$prog_obj->price = $request->price;	
							$prog_obj->save();

							return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));

                    }
             
             break;  
             
             case 'add_class':
 
           

                       $get_id = Classes::create([
                            'programmes_id' => $request->programme_id,
                            'teacher_id' => $request->teacher,
                        ]);


                        $batch_insert = array();

                        $get_dates = json_decode($request->arr_date, true);
                        $get_start = json_decode($request->arr_start, true);
                        $get_end = json_decode($request->arr_end, true);

                        //  echo ("hehe". $get_start[0]);
                        // print_r($request->all());exit;


                        for($x=0; $x < sizeof($get_start); $x++)
                        {
                 
                            
                                   $create_arr = array(
                                       'class_id' => $get_id->id,
                                       'start_date' => date("Y-m-d", strtotime($get_dates[$x])),
                                       'end_date' => date("Y-m-d", strtotime($get_dates[$x])),
                                       'start_time' => date("H:i", strtotime($get_start[$x])),   
                                       'end_time' =>   date("H:i", strtotime($get_end[$x])));
                                  
                                   array_push($batch_insert, $create_arr);
       
                        }
            

            
                        LiveClassSchedule::insert($batch_insert);


                    return Response::json(array('error'=>false , 'message'=>'Data Successfully Added'));
                
              break;

              case 'load_classes':


                $data = Classes::with('live_class')->where('programmes_id' , $request->id)->get();
    
                return json_encode($data);

             break;


    	}
    }


}
