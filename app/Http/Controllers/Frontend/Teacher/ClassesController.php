<?php

namespace App\Http\Controllers\Frontend\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrcaClass;
use App\Models\OrcaClassLiveClassSchedule;
use Illuminate\Support\Facades\Storage;
use App\Models\OrcaClassPreRecordedVideo;
use App\Models\Programmes;
use App\Models\Classes;
use App\Models\LiveClassSchedule;
// use Lakshmaji\Thumbnail\Facade\Thumbnail;
// use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ClassesController extends Controller
{

    /**
     * Enpoint for all ajax request for this Controller.
     *
     */
    public function ajax($section, Request $request)
    {   
        switch ($section) {
            case 'add_pre_recorded_class':
                return $this->storePreRecordClass($request);
                break;

            case 'upload_pre_recorded_videos':
                return $this->uploadVideo($request);
                break;

            case 'delete_pre_recorded_videos':
                return $this->deleteVideo($request);
                break;

            case 'get_schedule_form':
                return $this->generateScheduleForm($request);
                break;

            case 'add_live_class':
                return $this->storeLiveClass($request);
                break;

            case 'get_active_class':
                return $this->generateActiveClass($request);
                break;

            case 'get_single_class':
                return $this->getSingleClass($request);
                break;

            case 'edit_pre_recorded_class':
                return $this->updatePreRecordedClass($request);

            case 'upload_cover_photo':
                return $this->processUploadCoverPhoto($request);
                break;

            case 'delete_class':
                return $this->processDeleteClass($request);
                break;
            
            case 'edit_live_class':
                return $this->editLiveClass($request);
                break;
            
            case 'remove_schedule':
                return $this->removeLiveClassSchedule($request);
                break;
            
            case 'edit_save_draft_live':
                return $this->editSaveDraftLiveClass($request);
                break;
            case 'update_added_classes':
                return $this->updateLiveClassProgrammes($request);
                break;
            case 'edit_live_schedules':
                return $this->updateLiveClassSchedules($request);
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function processDeleteClass($request)
    {

        try {

            DB::beginTransaction();

            $class = Programmes::find($request->id)->delete();
            

            DB::commit();

            $response['success'] = true;
            $response['title'] = 'Deleted';
            $response['message'] = 'Class has been deleted successfully';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on deleting class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }

    private function processUploadCoverPhoto($request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();

            // $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }

        try {

            DB::beginTransaction();

            auth()->user()->teacherDetails()->update([
                'profile_picture' => $imageName
            ]);

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/profile/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/profile/image',
                    $request->file,
                    $imageName
                );
            }

            $response['success'] = true;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on uploading image.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }

    private function updatePreRecordedClass($request)
    {
        $class_id = $request->id;
        $orcaClass = Programmes::find($class_id);
        $imageName = '';
        $class = $request->only(
            'title',
            'description',
            'categories_id',
            'class_type',
            'price',
            'cover_photo',
        );

        $video = $request->only(
            'pre_recorded_video',
        );

        $validator = \Validator::make($class, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'orca_categories_id' => 'required|array|min:1',
            'categories_id.*' => 'required',
            // 'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            //Custom validation message
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'price.required' => 'This field is required',
            'categories_id.*.required' => 'This field is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if ($request->file('cover_photo')) {
            $imagePath = $request->file('cover_photo');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();
        } else {
            $imageName = $orcaClass->cover_photo;
        }

        try {

            DB::beginTransaction();

            $update_class = $orcaClass->update($class);
            $orcaClass->cover_photo = $imageName;
            $orcaClass->is_published = $request->edit_save_draft;
            $orcaClass->save();
            if ($request->has('pre_recorded_video')) {
                $updated_videos = [];

                foreach ($request->pre_recorded_video as $key => $value) {
                    array_push($updated_videos, $key);
                    // return response()->json($value['class_name']);
                    $video = OrcaClassPreRecordedVideo::find($key);
                    $video->class_name = $value['class_name'];
                    $video->temp_upload = NULL;
                    $video->programmes_id = $class_id;
                    $video->save();
                }

                $old_videos = OrcaClassPreRecordedVideo::whereNotIn('id', $updated_videos)
                    ->where('programmes_id', $class_id)
                    ->update(['programmes_id' => null]);
            }

            //Delete all uploaded videos without orca_classes_id
            $this->deleteTempVideos();

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/class/image
             */
            if ($request->file('cover_photo')) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/class/image',
                    $request->cover_photo,
                    $imageName
                );
            }


            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Class Updated';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    public function deleteTempVideos()
    {
        $temp_videos = OrcaClassPreRecordedVideo::where('programmes_id', NULL)->get();
        foreach ($temp_videos as $key => $value) {
            Storage::delete($value->video_path);
            OrcaClassPreRecordedVideo::find($value->id)->delete();
        }
    }


    private function getSingleClass($request)
    {
        $relation = $request->type == 'live_class' ? 'liveClass' : 'preRecordedVideos';
        $class = Programmes::where('id', $request->id)
            ->where('class_type', $request->type)->with($relation)->first();
        if ($request->type === 'pre_recorded_class') {
            
            return view('frontend.teacher.includes._edit-pre-recorded-overlay-contents', compact('class'));
        }

        if ($request->type === 'live_class') {

            return view('frontend.teacher.includes._edit-live-class-overlay-contents', compact('class'));
            
        }
    }

    private function generateActiveClass($request)
    {
        if ($request->type == 'live_class') {
            // $schedules = OrcaClass::with('liveClass', 'creator')
            //     ->where('class_type', $request->type)
            //     ->where('is_published', 1)
            //     ->where('user_id', auth()->user()->id)
            //     ->latest()
            //     ->paginate(5);
            
            $programmes = Programmes::where('is_published', '2')
            ->where('user_id', auth()->user()->id)
            ->where('class_type', $request->type)
            ->with('classes', 'classes.live_class')->paginate(5);
            // dd($programmes);
            return view('frontend.teacher.classes._active-live-classes', compact('programmes'));
        } elseif ($request->type == 'pre_recorded_class') {
            $classes = Programmes::where('class_type', $request->type)
                ->where('is_published', 1)
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->paginate(5);
            // dd($classes);
            return view('frontend.teacher.classes._active-pre-recorded-classes', compact('classes'));
        } elseif($request->type == 'draft_pre_recorded'){

            $classes = Programmes::where('class_type', 'pre_recorded_class')
                ->where('is_published', 0)
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->paginate(5);
            // dd($classes);
            return view('frontend.teacher.classes._draft-pre-recorded', compact('classes'));

        }elseif($request->type == 'draft_live_class'){

            $schedules = Programmes::with('liveClass', 'creator')
                ->where('class_type', 'live_class')
                ->where('is_published', 1)
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->paginate(5);
            return view('frontend.teacher.classes._draft-live-class', compact('schedules'));

        }
    }

    private function generateScheduleForm($request)
    {
        $index = $request->index;
        return view('frontend.teacher.includes._schedule-row', compact('index'));
    }

    private function storeLiveClass($request)
    {   
        $imageName = '';
        $programmes = $request->only(
            'title',
            'description',
            'orca_categories_id',
            'class_type',
            'cover_photo',
        );

        $schedule = $request->only(
            'schedule',
        );

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            // 'orca_categories_id' => 'required|array|min:1',
            'orca_categories_id.*' => 'required',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            //Custom validation message
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'orca_categories_id.*.required' => 'This field is required',
            'cover_photo' => 'this field is required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if ($request->file('cover_photo')) {
            $imagePath = $request->file('cover_photo');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();
        }

        try {

            DB::beginTransaction();

            $saved_programmes = Programmes::create($programmes);
            $saved_programmes->user_id = auth()->user()->id;
            $saved_programmes->cover_photo = $imageName;
            $saved_programmes->is_published = $request->save_as;
            $saved_programmes->price = $request->price;
            $saved_programmes->categories_id = $request->orca_categories_id;
            $saved_programmes->no_student = $request->no_student;
            $saved_programmes->level_id = $request->class_level;
            $saved_programmes->save();

            $classes = Classes::create();
            $classes->programmes_id = $saved_programmes->id;
            $classes->teacher_id = auth()->user()->teacherDetails->id;
            $classes->save();

            if ($request->has('schedule')) {
                foreach ($request->schedule as $key => $value) {
                    $live_classes = LiveClassSchedule::create();
                    $live_classes->class_id = $classes->id;
                    $live_classes->start_date = $value['start_date'];
                    $live_classes->start_time = $value['start_time'];
                    $live_classes->end_time = $value['end_time'];
                    $live_classes->save();
                }
            }

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/class/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/class/image',
                    $request->cover_photo,
                    $imageName
                );
            }


            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Class Added';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        $last_save_data = Programmes::where('is_published', '0')
            ->where('user_id', auth()->user()->id)
            ->where('id', $saved_programmes->id)
            ->with('classes', 'classes.live_class')->first();

        // return response()->json($response);
        return view('frontend.teacher.classes._generate_added_live_schedule', compact('last_save_data'));
    }

    private function storePreRecordClass($request)
    {
        // return response()->json($request->orca_categories_id);
        $imageName = '';
        $programmes = $request->only(
            'title',
            'description',
            'categories_id',
            'class_type',
            'price',
            'cover_photo',
        );

        $video = $request->only(
            'pre_recorded_video',
        );

        $validator = \Validator::make($programmes, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'orca_categories_id' => 'required|array|min:1',
            'categories_id.*' => 'required',
            // 'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            //Custom validation message
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'price.required' => 'This field is required',
            'categories_id.*.required' => 'This field is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if ($request->file('cover_photo')) {
            $imagePath = $request->file('cover_photo');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();
        }

        try {

            DB::beginTransaction();

            $saved_programmes = Programmes::create($programmes);
            $saved_programmes->user_id = auth()->user()->id;
            $saved_programmes->cover_photo = $imageName;
            $saved_programmes->is_published = $request->save_draft;
            $saved_programmes->save();

            if ($request->has('pre_recorded_video')) {
                foreach ($request->pre_recorded_video as $key => $value) {
                    $video = OrcaClassPreRecordedVideo::find($key);
                    $video->class_name = $value['class_name'];
                    $video->temp_upload = NULL;
                    $video->programmes_id = $saved_programmes->id;
                    $video->save();
                }
            }

            //Delete all uploaded videos without orca_classes_id
            $this->deleteTempVideos();

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/class/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/class/image',
                    $request->cover_photo,
                    $imageName
                );
            }


            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Class Added';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    private function deleteVideo($request)
    {

        try {

            DB::beginTransaction();
            if ($request->has('id')) {
                $requested_video = OrcaClassPreRecordedVideo::find($request->id);
                Storage::delete($requested_video->video_path);
                OrcaClassPreRecordedVideo::find($requested_video->id)->delete();
            }

            DB::commit();


            if (!$request->is_update) {
                $temp_videos = OrcaClassPreRecordedVideo::where('temp_upload', 1)->get();
            } else {
                $class = OrcaClass::find($request->class_id);
                if ($class->preRecordedVideos()->count()) {
                    $temp_videos = $class->preRecordedVideos;
                }
            }
            $response['success'] = true;
            $response['temp_videos'] = $temp_videos;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on deleting video.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }
        return response()->json($response, 200);
    }

    private function uploadVideo($request)
    {
        // return response()->json($request->all());
        $video = [];
        $validator = \Validator::make($request->all(), [
            'file' => 'required|file|mimetypes:video/mp4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        $video_file = $request->file('file');
        $video['class_name'] = 'Class_' . time();
        $video['file_name'] = $video['class_name'] . '_' . $video_file->getClientOriginalName();
        $video['type'] = $video_file->getClientMimeType();
        $video['file_size'] = $video_file->getSize();
        $video['temp_upload'] = 1;
        // $video['orca_classes_id'] = $request->class_id;

        try {

            DB::beginTransaction();
            $class = OrcaClassPreRecordedVideo::create($video);

            /*
                * Upload User avatar in public/storage/uploads/teacher/class/pre-recorded/
                */
            if ($class) {

                // Upload the file on the storage folder
                $video_path = Storage::disk('public')->putFileAs(
                    'uploads/teacher/class/pre-recorded/video',
                    $request->file,
                    $video['file_name']
                );

                $class->video_path = $video_path;
                $class->save();

                // if ($video_path) {
                //     $thumbnail_path = storage_path() . 'uploads/teacher/class/pre-recorded/video/thumbnail';
                //     $thumbnail_name = 'thumb_' . $video['file_name'] .  '.png';
                //     $time_to_image = 1.5;

                //     $media = FFMpeg::open($video_path);
                //     $frame = $media->getFrameFromString('00:00:01');
                //     dd($frame);
                // }
            }

            DB::commit();

            $response['success'] = true;
            $response['video'] = $class;
            $response['placeholder_image'] = asset('frontend/images/placeholder-thumbnail.png');
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on uploading image.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }
        return response()->json($response, 200);
    }

    public function editLiveClass($request){
        $class_id = $request->id;
        $orcaClass = OrcaClass::find($class_id);
        $imageName = '';
        $class = $request->only(
            'title',
            'description',
            'orca_categories_id',
            'class_type',
            'cover_photo',
            'price',
        );

        $validator = \Validator::make($class, [
            'title' => 'required',
            'description' => 'required',
            // 'orca_categories_id' => 'required|array|min:1',
            'categories_id.*' => 'required',
            // 'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            //Custom validation message
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'categories_id.*.required' => 'This field is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if ($request->file('cover_photo')) {
            $imagePath = $request->file('cover_photo');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();

        } else {
            $imageName = $orcaClass->cover_photo;
        }

        try {

            DB::beginTransaction();

            $update_class = $orcaClass->update($class);
            $orcaClass->cover_photo = $imageName;
            $orcaClass->price = $request->price;
            $orcaClass->is_published = $request->edit_save_draft;
            $orcaClass->save();

            if ($request->has('edit_schedule')) {

                foreach ($request->edit_schedule as $key => $value) {
                    $schedule = OrcaClassLiveClassSchedule::find($value['liveclass_id']);
                    $schedule->start_date = $value['start_date'];
                    $schedule->start_time = $value['start_time'];
                    $schedule->end_time = $value['end_time'];
                    $schedule->is_published = $request->edit_save_draft;
                    $schedule->save();
                }
            }
            
            if ($request->has('schedule')) {
                foreach ($request->schedule as $key => $value) {
                    $schedule = OrcaClassLiveClassSchedule::create($value);
                    $schedule->orca_classes_id = $class_id;
                    $schedule->save();
                }
            }

            if ($request->file('cover_photo')) {

                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/class/image',
                    $request->cover_photo,
                    $imageName
                );
            }

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/class/image
             */
           


            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Class Updated';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);

    }

    public function removeLiveClassSchedule($request){

        try {

            DB::beginTransaction();
            if ($request->has('id')) {
                OrcaClassLiveClassSchedule::find($request->id)->delete();
            }

            DB::commit();

            $response['success'] = true;

        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on removing live class schedule.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 200);

    }
    public function updateLiveClassProgrammes($request){

        // echo '<pre>';
        // print_r($request->all());
        // exit;

        $update_programmes = Programmes::find($request->to_update);

        $programmes = $request->only(
            'title',
            'description',
            'price',
            'class_type',
            'cover_photo',
            'no_student',
        );

        $schedule = $request->only(
            'schedule',
        );

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            // 'orca_categories_id' => 'required|array|min:1',
            'orca_categories_id.*' => 'required',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            //Custom validation message
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'orca_categories_id.*.required' => 'This field is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if ($request->file('cover_photo')) {
            $imagePath = $request->file('cover_photo');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();

        }

        try {

            DB::beginTransaction();

            $updated = $update_programmes->update($programmes);
            $update_programmes->categories_id = $request->orca_categories_id;
            $update_programmes->level_id = $request->class_level;
            $update_programmes->is_published = $request->save_as;
            $update_programmes->cover_photo = $imageName;
            $update_programmes->save();

            $classes = Classes::create();
            $classes->programmes_id = $request->to_update;
            $classes->teacher_id = auth()->user()->teacherDetails->id;
            $classes->save();

            if ($request->has('schedule')) {

                foreach ($request->schedule as $key => $value) {

                    if(isset($value['start_date']) && isset($value['start_time']) && isset($value['end_time'])){

                        $live_classes = LiveClassSchedule::create();
                        $live_classes->class_id = $classes->id;
                        $live_classes->start_date = $value['start_date'];
                        $live_classes->start_time = $value['start_time'];
                        $live_classes->end_time = $value['end_time'];
                        $live_classes->save();

                    }

                }
                
            }

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/class/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/class/image',
                    $request->cover_photo,
                    $imageName
                );
            }


            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Class Added';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        $last_save_data = Programmes::where('is_published', '0')
            ->where('user_id', auth()->user()->id)
            ->where('id', $update_programmes->id)
            ->with('classes', 'classes.live_class')->first();

        // return response()->json($response);
        return view('frontend.teacher.classes._generate_added_live_schedule', compact('last_save_data'));
    }

    public function updateLiveClassSchedules($request){

        $class = Classes::where('id', $request->id)->with('live_class')->first();
        // dd($class);
        return view('frontend.teacher.classes._edit_live_schedule_row', compact('class'));
    }
}
