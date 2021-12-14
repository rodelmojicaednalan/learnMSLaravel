<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;
use App\Models\Child;
use App\Models\Subject;
use App\Models\Grading;
use App\Models\GradingSubject;
use App\Models\Training;
use Omnipay\Omnipay;
use App\Models\PaymentTransaction;
use App\Models\Classes;
use App\Models\ArtbugClass;
use App\Models\ClassEnrollee;

class ClassesController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth','role:parent']);
	}
    public function index()
    {
        $page_title = 'Classes';
        $page_description = '';

		$childrens = Child::where('parent_id', Auth::user()->id)->get();
		$subjects = Subject::all();

        return view('backend.parent.classes.index', compact('page_title', 'page_description'))->with('subjects', $subjects)->with('childrens' , $childrens);
    }

    public function meeting()
    {
		$page_title = 'Class Schedule';
        $page_description = '';

		$count = ClassEnrollee::where('user_id', Auth::user()->id)->count();

        return view('backend.parent.classes.zoom', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
        $enrolled = ClassEnrollee::where('user_id', auth()->user()->id)
                            ->pluck('class_id')
                            ->toArray();

        $enrolled_child = ClassEnrollee::where('user_id', auth()->user()->id)
                            ->pluck('child_id')
                            ->toArray();
        $search = $request->all();
    	switch ($section) {
            case 'private-class-list-recommend':

                $data = ArtbugClass::with('schedule','user' , 'subject','level')
                                ->whereHas('level', function($q) {
                                    return $q->where('number', 1);
                                })
                                // ->whereNotIn('id', $enrolled)
                                ->where('type', 'private')
                                ->where(function($query) use ($search)
                                    {
                                        if($search['query']) {
                                            if (isset($search['query']['generalSearch'])) {
                                                $query->where('class', 'LIKE', "%{$search['query']['generalSearch']}%");

                                            }
                                        }
                                    })
                                ->get();

                return json_encode($data);
            break;

            case 'public-class-list-recommend':

                $data = ArtbugClass::with('schedule','user' , 'subject','level')
                                ->whereHas('level', function($q) {
                                    return $q->where('number', 1);
                                })
                                // ->whereNotIn('id', $enrolled)
                                ->where('type', 'public')
                                ->where(function($query) use ($search)
                                    {
                                        if($search['query']) {
                                            if (isset($search['query']['generalSearch'])) {
                                                $query->where('class', 'LIKE', "%{$search['query']['generalSearch']}%");

                                            }
                                        }
                                    })
                                ->get();

                return json_encode($data);
            break;

    		case 'private-class-list';
                $data = ClassEnrollee::with('child', 'schedule', 'class', 'class.user')
                            ->whereHas('class', function($q) use ($search) {
                                $q->where('type', 'private')
                                ->where(function($query) use ($search)
                                {
                                    if($search['query']) {
                                        if (isset($search['query']['generalSearch'])) {
                                            $query->where('class', 'LIKE', "%{$search['query']['generalSearch']}%");

                                        }
                                    }
                                });
                            })
                            ->where('user_id', auth()->user()->id)
                            ->get();

                // $data = ArtbugClass::with('schedule','user', 'subject','level', 'enrollees', 'enrollees.child')
                //         ->whereIn('id', $enrolled)
                //         ->where('type', 'private')
                //         ->where(function($query) use ($search)
                //             {
                //                 if($search['query']) {
                //                     if (isset($search['query']['generalSearch'])) {
                //                         $query->where('class', 'LIKE', "%{$search['query']['generalSearch']}%");

                //                     }
                //                 }
                //             })
                //         ->get();

                return json_encode($data);
            break;

            case 'public-class-list':

                $data = ClassEnrollee::with('child', 'schedule', 'class', 'class.user')
                            ->whereHas('class', function($q) use ($search) {
                                $q->where('type', 'public')
                                ->where(function($query) use ($search)
                                {
                                    if($search['query']) {
                                        if (isset($search['query']['generalSearch'])) {
                                            $query->where('class', 'LIKE', "%{$search['query']['generalSearch']}%");

                                        }
                                    }
                                });
                            })
                            ->where('user_id', auth()->user()->id)
                            ->get();

                // $data = ArtbugClass::with('schedule','user' , 'subject','level')
                //             ->whereIn('id', $enrolled)
                //             ->where('type', 'public')
                //             ->where(function($query) use ($search)
                //                 {
                //                     if($search['query']) {
                //                         if (isset($search['query']['generalSearch'])) {
                //                             $query->where('class', 'LIKE', "%{$search['query']['generalSearch']}%");

                //                         }
                //                     }
                //                 })
                //             ->get();

                return json_encode($data);
            break;

		    case 'request_grading':

				$insert_grading = Grading::create([
					'children_id' => $request->children_id,
					'parent_id' => Auth::user()->id,
				]);


				$batch_insert = array();

				$subjects = json_decode($request->subjects, true);

				for($x=0; $x < sizeof($subjects); $x++)
				{

						   $create_arr = array('grading_id' => $insert_grading->id , 'subject_id' => $subjects[$x]);
						   array_push($batch_insert, $create_arr);

				}



				GradingSubject::insert($batch_insert);

				return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>'[]'));

			break;

    		default:

    			break;
    	}
    }
}
