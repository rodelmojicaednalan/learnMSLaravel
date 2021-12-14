<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ArtbugClass;
use App\Models\Curriculum;
use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;

class CurriculumsController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth','role:teacher']);
	}
    public function index()
    {
        $page_title = 'Curriculums';
        $page_description = '';

        return view('backend.teacher.curriculum.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'curriculum-list':
    	            $data = Curriculum::where('level_id', $request->level_id)->get();
    				return json_encode($data);
    			break;

			case 'subjects_list':
            $subjects = [];
			if(auth()->user()->hasRole('teacher')){
                $class = ArtbugClass::where('teacher_id', auth()->user()->id)->get();

                foreach ($class as $key => $value) {
                    array_push($subjects, $value->subject_id);
                }

                $subject = Subject::whereIn('id', $subjects)->get();
                // array_push($levels, $get_levels);
                // $_levels = array_push($levels, $data);

                for($z=0; $z < sizeof($subject); $z++){
                    $get_levels = Level::where('subject_id', $subject[$z]->id)->get();
                    $subject[$z]->levels = $get_levels;
                }

                return json_encode($subject);

			}

			break;

    		default:

    			break;
    	}
    }
}
