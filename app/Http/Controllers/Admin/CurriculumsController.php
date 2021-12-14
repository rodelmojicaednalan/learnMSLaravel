<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;
use Auth;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Curriculum;
use Illuminate\Support\Facades\File;

class CurriculumsController extends Controller
{

	public function __construct()
	{
	    $this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Curriculums';
        $page_description = '';

        return view('backend.administrator.curriculum.index', compact('page_title', 'page_description'));
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
			
			case 'update_material':
				$curr = Curriculum::where('id', $request->id)->first();
				return json_encode($curr);
                
            break;

			case 'update_single_material':

				$cur_obj = Curriculum::where('id', $request->id)->first();

				$cur_obj->description = $request->description;
				$cur_obj->view_type = $request->view_type;

				$cur_obj->save();

				return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>[]));
			
                
            break;

			
    		case 'curriculum-list':
    	            $data = Curriculum::where('level_id', $request->level_id)->get();
    				return json_encode($data);
    			break;
			case 'subjects_list':
			if(Auth::user()->hasRole('administrator')){
			$data = Subject::get();
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


				$ran_str = substr(str_shuffle("0123456789"), 0, 3);
				$gext = $_FILES['file']['name'];
				$ext = pathinfo($gext, PATHINFO_EXTENSION);
				$gname= basename($_FILES['file']['name'] , ".". $ext);




				$new_name = $_FILES['file']['name'];
				// $new_name = $ranstr.'.'.$ext;

				$file = $request->file('file');

				$check_filename = Curriculum::where('path', $new_name)->get();

				if(sizeof($check_filename) > 0)
                {
					$new_name = $gname."_".$ran_str.".".$ext;
					$gname = $gname."_".$ran_str;
				}



				$file->move(public_path('upload_img'), $new_name);



				$insert_id = Curriculum::create([
					'level_id' => $request->level_id,
					'name' => $gname,
					'size' =>   $_FILES['file']['size'],
					'type' =>   $_FILES['file']['type'],
					'path' => $new_name,
				]);


			break;

    		default:

    			break;
    	}
    }
}
