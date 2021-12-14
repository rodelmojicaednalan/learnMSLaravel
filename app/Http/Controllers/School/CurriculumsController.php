<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;
use Auth;
use App\Models\Category;
use App\Models\Level;
use App\Models\Curriculum;
use App\Models\CurriculumResources;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CurriculumsController extends Controller
{

	public function __construct()
	{
	    $this->middleware(['auth','role:school_administrator']);
	}
    public function index()
    {
        $page_title = 'Curriculums';
        $page_description = '';

		$subjects = Category::orderBy('category')->get();
        
		$new_data = [];
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

		// print_r($new_data);exit;

        return view('backend.school.administrator.curriculum.index', compact('page_title', 'page_description'))->with('subjects', $new_data);
    }

    public function deleteMaterial($request) {
        if ($request->has('id')) {
            $curr = Curriculum::where('id', $request->id)->first();
            if(File::exists(public_path('upload_img/' . $curr->path))){

                File::delete(public_path('upload_img/' . $curr->path));

            }

            $delete = $curr->delete();
            return response()->json([
                'success' => $delete,
                'message' => 'File deleted.'
            ]);
        }
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
            case 'delete_material':
                return $this->deleteMaterial($request);
            break;

			case 'add_curriculum':

				if(Auth::user()->hasRole('school_administrator'))
				{

					$getid = $request->id;

					$curr_obj = Curriculum::where('id', $getid)->first();

					

					

					if(empty($curr_obj)) 
					{   

						$validator = \Validator::make($request->all(), [
							'name' => 'required|unique:curriculum',
							'subject' => 'required',
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

							$exists = Storage::disk('local')->has('uploads/school/curriculum/image/');
		
							$filePath = 'uploads/school/curriculum/image/' . $new_name;
		
							if (!$exists) {
								Storage::disk('public')->makeDirectory('uploads/school/curriculum/image/');
							}
		
							Storage::disk('public')->put($filePath, file_get_contents($image));
    
                        }
                        else {
                            $new_name = "";
                        }

						$currUser = Auth::user();
						$school = $currUser->schoolAdmin;

						$insert_id = Curriculum::create([
						'thumbnail' => $new_name,   
						'name' => $request->name, 
						'description' => $request->description,  
						'fees' => $request->fee,  
						'subject_id' => $request->subject,    
						'school_id' => $school->id,  
						]);

						return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
					}
					else  
					{
						 if($request->old_name == $request->name)
						 {

							$validator = \Validator::make($request->all(), [
								'name' => 'required',
								'subject' => 'required',
								]);
			
								if ($validator->fails())
								{
									return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
								}

						 }

						 else {

							$validator = \Validator::make($request->all(), [
								'name' => 'required|unique:curriculum',
								'subject' => 'required',
								]);
			
								if ($validator->fails())
								{
									return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
								}

						 }

					

						if ($request->hasFile('get_file')) {
                        

                            $image = $request->file('get_file');
                            $full_name = $image->getClientOriginalName();
                            $filename = pathinfo($full_name, PATHINFO_FILENAME);
                            $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                            $ranstr = sha1(time());
                            
                            $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();

							$exists = Storage::disk('local')->has('uploads/school/curriculum/image/');
		
							$filePath = 'uploads/school/curriculum/image/' . $new_name;
		
							if (!$exists) {
								Storage::disk('public')->makeDirectory('uploads/school/curriculum/image/');
							}

							$delete_exist = Storage::disk('public')->has('uploads/school/curriculum/image/'.$request->old_img);

							if($delete_exist)
							{
								Storage::disk('public')->delete('uploads/school/curriculum/image/'.$request->old_img);
							}
		
							Storage::disk('public')->put($filePath, file_get_contents($image));
    
                        }
                        else {
                            $new_name = "";
                        }
						
						$curr_obj->name = $request->name;
						$curr_obj->description = $request->description;
						$curr_obj->fees = $request->fee;
						$curr_obj->subject_id = $request->subject;
						$curr_obj->thumbnail = $new_name;

	
						$curr_obj->save();

						return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
					}

				}
				
		    break;
			
			case 'update_material':
				$curr = CurriculumResources::where('id', $request->id)->first();
				return json_encode($curr);
                
            break;

			case 'get_single_curriculum':
				$curr = Curriculum::with('subject')->where('id', $request->id)->first();
				return json_encode($curr);
                
            break;

	
			case 'update_single_material':

				$cur_obj = CurriculumResources::where('id', $request->id)->first();

				$cur_obj->description = $request->description;
				$cur_obj->view_type = $request->view_type;

				$cur_obj->save();

				return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>[]));
			
                
            break;

			
    		case 'curriculum-list':
                $currUser = Auth::user();
                $school = $currUser->schoolAdmin;
                $data = CurriculumResources::where('curr_id', $request->curr_id)->get();
                return json_encode($data);

    			break;

			case 'curriculum-table':
				$currUser = Auth::user();
				$school = $currUser->schoolAdmin;
				$data = Curriculum::with('subject')->where('school_id' , $school->id)->get();
				return json_encode($data);

			break;

			case 'subjects_list':

            $currUser = Auth::user();
            $school = $currUser->schoolAdmin;
			if(Auth::user()->hasRole('school_administrator')){
			$data = Category::where('school_id' , $school->id)->get();
			for($z=0; $z < sizeof($data); $z++)
			{
				$get_levels = Level::where('subject_id', $data[$z]->id)->get();
				$data[$z]->levels = $get_levels;
			}

			return json_encode($data);
			}
			break;

			case 'file_upload':

                // print_r($request->all());exit;
                $currUser = Auth::user();
                $school = $currUser->schoolAdmin;

				$new_name = $_FILES['file']['name'];
				// $new_name = $ranstr.'.'.$ext;

				$file = $request->file('file');

				$check_filename = CurriculumResources::where('path', $new_name)->get();

				
				$ran_str = substr(str_shuffle("0123456789"), 0, 3);
				$gext = $_FILES['file']['name'];
				$ext = pathinfo($gext, PATHINFO_EXTENSION);
				$gname= basename($_FILES['file']['name'] , ".". $ext);
				
				if(sizeof($check_filename) > 0)
                {
					$new_name = $gname."_".$ran_str.".".$ext;
					$gname = $gname."_".$ran_str;
				}

				$exists = Storage::disk('local')->has('uploads/school/curriculum/image/');

				$filePath = 'uploads/school/curriculum/image/' . $new_name;

				if (!$exists) {
					Storage::disk('public')->makeDirectory('uploads/school/curriculum/image/');
				}

				Storage::disk('public')->put($filePath, file_get_contents($file));

				// $file->move(public_path('upload_img'), $new_name);



				$insert_id = CurriculumResources::create([
					'curr_id' => $request->curr_id,
					'name' => $gname,
					'size' =>   $_FILES['file']['size'],
					'type' =>   $_FILES['file']['type'],
					'view_type' => "private",
					'description' => "",
					'path' => $new_name,
				]);


			break;

    		default:

    			break;
    	}
    }
}
