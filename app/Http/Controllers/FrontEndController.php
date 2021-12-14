<?php

namespace App\Http\Controllers;

use Response;
use App\Models\mdCountry;
use App\Models\OrcaClass;
use App\Models\Curriculum;
use App\Models\OrcaClassLiveClassSchedule;
use App\Models\OrcaCategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Programmes;
use App\Models\LiveClassSchedule;
use App\Models\Classes;

class FrontEndController extends Controller
{
    public function index()
    {
        $page = 'home';
        $page_title = 'Home';
        $countries = mdCountry::all();
        $classes = Programmes::inRandomOrder()->with('orcaCategory', 'user')->limit(4)->get();
        $product_count = Programmes::all();
        $curriculum_list = Curriculum::inRandomOrder()->with('category', 'school.user')->limit(4)->get();
        $curriculum_count = Curriculum::All();

        return view('frontend.general.index', compact('page', 'page_title', 'classes', 'product_count', 'curriculum_list', 'curriculum_count'))->with('countries', $countries);
    }

    public function about()
    {
        $page = 'about';
        $page_title = 'About';
        $countries = mdCountry::all();
        return view('frontend.general.about', compact('page', 'page_title', 'countries'));
    }

    public function howToLearn()
    {
        $page = 'howtolearn';
        $page_title = 'How To Learn';
        $countries = mdCountry::all();
        return view('frontend.general.how-to-learn', compact('page', 'page_title', 'countries'));
    }

    public function classes()
    {
        $countries = mdCountry::all();
        $page = 'classes';
        $page_title = 'Classes';
        $category  = OrcaCategory::all();
        $classes = Programmes::with('orcaCategory', 'user')->paginate(9);
        $product_count = Programmes::all();
        // dd($classes);
        return view('frontend.general.classes', compact('page', 'page_title', 'classes', 'product_count'))->with('countries', $countries);
    }

    public function load_parent_category()
    {
        $arr  = OrcaCategory::where('parent_id', "0")->get();
        return json_encode($arr);
    }

    public function load_children_category(Request $request)
    {
        $arr  = OrcaCategory::where('category', $request->category)->where('parent_id', '!=', "0")->get();
        for ($z = 0; $z < sizeof($arr); $z++) {
            $child_exist = OrcaCategory::where('parent_id', $arr[$z]->id)->first();

            $check_main_parent = OrcaCategory::where('id', $arr[$z]->parent_id)->first();

            if ($check_main_parent) {
                $arr[$z]->check_main_parent = $check_main_parent->parent_id;
            } else {
                $arr[$z]->check_main_parent = "0";
            }

            if ($child_exist) {
                $arr[$z]->child_exist = "yes";
            } else {
                $arr[$z]->child_exist = "no";
            }
        }
        return json_encode($arr);
    }


    public function howToTeach()
    {
        $page = 'howtoteach';
        $page_title = 'How to Teach';
        $countries = mdCountry::all();
        return view('frontend.general.how-to-teach', compact('page', 'page_title', 'countries'));
    }

    public function curriculum()
    {
        $page = 'curriculum';
        $page_title = 'Curriculum';
        $countries = mdCountry::all();
        $curriculum_list = Curriculum::with('category', 'school.user')->paginate(9);
        $curriculum_count = Curriculum::All();
        return view('frontend.general.curriculum', compact('page', 'page_title', 'countries', 'curriculum_list', 'curriculum_count'));
    }

    public function teacherHandbook()
    {
        $page = 'teacher_handbook';
        $page_title = "Teacher's Handbook";
        $countries = mdCountry::all();
        return view('frontend.general.teacher-handbook', compact('page', 'page_title', 'countries'));
    }

    public function collaborateWithUs()
    {
        $page = 'collaboratewithus';
        $page_title = "Collaborate with Us";
        $countries = mdCountry::all();
        return view('frontend.general.collaborate-with-us', compact('page', 'page_title', 'countries'));
    }

    public function contact()
    {
        $page = 'contact';
        $page_title = "Contact";
        $countries = mdCountry::all();
        return view('frontend.general.contact', compact('page', 'page_title', 'countries'));
    }

    public function schoolPreRecordedClassDetail()
    {
        $page = 'school-product-detail';
        $page_title = "School Pre Recorded Detail";
        $countries = mdCountry::all();
        return view('frontend.school.pre-recorded-class-detail', compact('page', 'page_title', 'countries'));
    }

    public function schoolLiveClassDetail()
    {
        $page = 'school-product-detail';
        $page_title = "School Live Class Detail";
        $countries = mdCountry::all();
        return view('frontend.school.live-class-detail', compact('page', 'page_title', 'countries'));
    }

    public function teacherPreRecordedClassDetail($id)
    {
        $page = 'teacher-product-detail';
        $page_title = "Teacher Pre Recorded Detail";
        $countries = mdCountry::all();
        $programmes = Programmes::where('id' , $id)->get();
        $list_programmes = Programmes::where('class_type' , "pre_recorded_class")->paginate(4);
        return view('frontend.general.pre-recorded-class-detail', compact('page', 'page_title', 'programmes', 'list_programmes', 'countries'));
    }
    public function teacherLiveClassDetail($id)
    {
        $page = 'teacher-product-detail';
        $page_title = "Teacher Live Class Detail";
        $countries = mdCountry::all();
        $programmes = Programmes::find($id);
        $list_programmes = Programmes::where('class_type' , "live_class")->paginate(4);
        return view('frontend.general.live-class-detail', compact('page', 'page_title', 'programmes', 'list_programmes', 'countries'));
    }
    public function frontendSchoolProfile(Request $request, $id){

        $page = 'School Profile';
        $page_title = 'School Profile Details';
        $school_profile = School::where('user_id', $id)->with('teacher', 'user', 'teacher.teacherDetails', 'user.social_link')->first();
        $teacher_list = $school_profile->teacher()->with('teacherDetails')->paginate(6);

        return view('frontend.general.school-profile', compact('page', 'page_title', 'school_profile', 'teacher_list'));
    }
    public function teacherPagination($id, Request $request){

        $school_profile = School::where('user_id', $id)->with('teacher', 'user', 'teacher.teacherDetails', 'user.social_link')->first();
        $teacher_list = $school_profile->teacher()->with('teacherDetails')->paginate(6);
        
        return view('frontend.includes._teacher-list', compact('school_profile', 'teacher_list'));

    }
    public function class_listing($id, Request $request){

        $classes = OrcaClass::with('orcaCategory', 'creator')->paginate(9);
        $product_count = OrcaClass::all();
        return view('frontend.includes._generate-class-list', compact('classes', 'product_count'));

    }
    public function curriculum_listing($id, Request $request){

        $curriculum_list = Curriculum::with('subject', 'subject.level', 'school.user')->paginate(9);
        $curriculum_count = Curriculum::All();
        return view('frontend.includes._generate-curriculum-list', compact('curriculum_list', 'curriculum_count'));

    }

    public function ajax($section , $id=null){
        switch ($section) {
            case 'live-list-class':
                return $this->getliveclasslist($id);
                break;
            
            default:
                # code...
                break;
        }
    }
    private function getliveclasslist($id){
        $programmes = Programmes::find($id);
        $live_class = Classes::where('programmes_id', $id)->first();
        $class_schedule = LiveClassSchedule::where('class_id', $live_class->id)->get();
        
        $data['programmes_details'] = $programmes;
        $data['class_details'] = $live_class;
        $data['live_schedule'] = $class_schedule;

        return response()->json(['data' => $data ]);
    }

}

