<?php

namespace App\Http\Controllers;

use App\Models\ArtbugClass;
use App\Models\ClassEnrollee;
use Illuminate\Http\Request;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use DateTime;
use TimeZone;
use App\Models\TrainingSchedule;
use App\Models\ClassSchedule;
use App\Models\User;
use App\Models\Subject;
use App\Models\Training;
use App\Models\TrainingApplicant;

class CalendarController extends Controller
{
    public function generateAdminCalendar($request) {

        $event = [];

        $data = TrainingSchedule::with('training')->get();

        foreach ($data as $key => $value) {
            $get_user = User::where('id', $value->training->trainer_id)->first();
            $subject_name = $value->training->subject->subject;
            $trainer_name = $get_user->first_name . " " . $get_user->last_name;
            $time_str = date("g:iA", strtotime($value->start_time))." - ".date("g:iA", strtotime($value->end_time));
            array_push($event,
                Event::create()
                    ->name("Subject: ".$subject_name.", Trainer: ". $trainer_name)
                    ->description($value->training->subject->subject . ' - ' . $time_str)
                    ->uniqueIdentifier('Training-' . $value->id)
                    ->createdAt(new DateTime($value->created_at, new \DateTimeZone('Asia/Singapore')))
                    ->startsAt(new DateTime($value->start_date . ' ' . $value->start_time, new \DateTimeZone('Asia/Singapore')))
                    ->endsAt(new DateTime($value->start_date . ' ' . $value->end_time, new \DateTimeZone('Asia/Singapore')))
            );
        }

        $class_data = ClassSchedule::with('subject')->get();

        foreach ($class_data as $k => $v) {
            $get_subject = Subject::where('id', $v->subject->subject_id )->first();
            $get_user = User::where('id', $v->subject->teacher_id)->first();
            $subject_name = $get_subject->subject;
            $teacher_name = $get_user->first_name . " " . $get_user->last_name;
            $time_str = date("g:iA", strtotime($v->start_time))." - ".date("g:iA", strtotime($v->end_time));
            array_push($event,
                Event::create()
                    ->name("Subject: ".$subject_name.", Teacher: ". $teacher_name)
                    ->description($v->subject->class . ' - ' . $time_str)
                    ->uniqueIdentifier('Class-' . $v->id)
                    ->createdAt(new DateTime($v->created_at, new \DateTimeZone('Asia/Singapore')))
                    ->startsAt(new DateTime($v->start_date . ' ' . $v->start_time, new \DateTimeZone('Asia/Singapore')))
                    ->endsAt(new DateTime($v->start_date . ' ' . $v->end_time, new \DateTimeZone('Asia/Singapore')))
            );
        }

        $data = Calendar::create('Artbug Calendar')
            ->event($event)
            ->refreshInterval(1);

        echo '<pre>';
        return $data->get();
        exit;
        return 'this is admin calendar';
    }

    public function generateTrainerCalendar($request) {
        $event = [];

        $data = Training::where('trainer_id', $request->id)->with('schedule', 'user' , 'subject')->get();
        // dd($data);
        foreach ($data as $key => $value) {
            $subject_name = $value->subject->subject;

            foreach ($value->schedule as $k => $v) {
                $time_str = date("g:iA", strtotime($v->start_time))." - ".date("g:iA", strtotime($v->end_time));
                array_push($event,
                    Event::create()
                        ->name("Subject: ".$subject_name)
                        ->description($value->subject->subject . ' - ' . $time_str)
                        ->uniqueIdentifier('Class-' . $value->id)
                        ->createdAt(new DateTime($v->created_at, new \DateTimeZone('Asia/Singapore')))
                        ->startsAt(new DateTime($v->start_date . ' ' . $v->start_time, new \DateTimeZone('Asia/Singapore')))
                        ->endsAt(new DateTime($v->start_date . ' ' . $v->end_time, new \DateTimeZone('Asia/Singapore')))
                );
            }

        }
        $data = Calendar::create('Artbug Calendar')
        ->event($event)
        ->refreshInterval(1);

        echo '<pre>';
        return $data->get();
    }

    public function generateTeacherCalendar($request) {
        $event = [];
        $training_schedule = TrainingApplicant::where('user_id', $request->id)->get();
        $class_schedule = ArtbugClass::where('teacher_id', $request->id)->where('type','private')->get();

        foreach ($training_schedule as $k => $v) {
            $get_schedules = TrainingSchedule::where('training_id', $v['training_id'])->get();

            if($get_schedules) {

                foreach ($get_schedules as $a => $b) {
                    $time_str = date("g:iA", strtotime($b->start_time))." - ".date("g:iA", strtotime($b->end_time));
                    array_push($event,
                        Event::create()
                            ->name("Subject: ".$b->training->subject->subject)
                            ->description($b->training->subject->subject . ' - ' . $time_str)
                            ->uniqueIdentifier('Class-' . $b->id)
                            ->createdAt(new DateTime($b->created_at, new \DateTimeZone('Asia/Singapore')))
                            ->startsAt(new DateTime($b->start_date . ' ' . $b->start_time, new \DateTimeZone('Asia/Singapore')))
                            ->endsAt(new DateTime($b->start_date . ' ' . $b->end_time, new \DateTimeZone('Asia/Singapore')))
                    );
                }

            }
        }

        echo '<pre>';
        foreach ($class_schedule as $k => $v) {

            foreach ($v->schedule as $key => $value) {
                $time_str = date("g:iA", strtotime($value->start_time))." - ".date("g:iA", strtotime($value->end_time));

                array_push($event,
                    Event::create()
                        ->name($v->class)
                        ->description($v->subject->subject . ' - ' . $time_str)
                        ->uniqueIdentifier('Class-' . $value->id)
                        ->createdAt(new DateTime($value->created_at, new \DateTimeZone('Asia/Singapore')))
                        ->startsAt(new DateTime($value->start_date . ' ' . $value->start_time, new \DateTimeZone('Asia/Singapore')))
                        ->endsAt(new DateTime($value->start_date . ' ' . $value->end_time, new \DateTimeZone('Asia/Singapore')))
                );

            }


        }

        $data = Calendar::create('Artbug Calendar')
        ->event($event)
        ->refreshInterval(1);

        echo '<pre>';
        return $data->get();
    }

    public function generateParentCalendar($request) {
        $get_class = ClassEnrollee::where('user_id', $request->id)->get();
        $event = [];
        // dd($get_class);

        foreach ($get_class as $k => $v) {
            $class_sched = ClassSchedule::where('class_id', $v['class_id'])->get();
            if ($class_sched) {
                foreach ($class_sched as $key => $value) {

                    $time_str = date("g:iA", strtotime($value->start_time))." - ".date("g:iA", strtotime($value->end_time));

                    array_push($event,
                        Event::create()
                            ->name($value->subject->subject->subject)
                            ->description($value->subject->subject->subject . ' - ' . $time_str)
                            ->uniqueIdentifier('Class-' . $value->id)
                            ->createdAt(new DateTime($value->created_at, new \DateTimeZone('Asia/Singapore')))
                            ->startsAt(new DateTime($value->start_date . ' ' . $value->start_time, new \DateTimeZone('Asia/Singapore')))
                            ->endsAt(new DateTime($value->start_date . ' ' . $value->end_time, new \DateTimeZone('Asia/Singapore')))
                    );
                }
            }
        }

        $data = Calendar::create('Artbug Calendar')
            ->event($event)
            ->refreshInterval(1);

        echo '<pre>';
        return $data->get();

    }

    public function generate(Request $request) {

        switch ($request->role) {
            case 'administrator':
                return $this->generateAdminCalendar($request);
                break;

            case 'trainer':
                return $this->generateTrainerCalendar($request);
                break;

            case 'teacher':
                return $this->generateTeacherCalendar($request);
                break;

            case 'parent':
                return $this->generateParentCalendar($request);
                break;

            default:
                # code...
                break;
        }

        // $event = [];
        // $data = TrainingSchedule::with('training')->get();

        // foreach ($data as $key => $value) {
        //     $get_user = User::where('id', $value->training->trainer_id)->first();
        //     $subject_name = $value->training->subject->subject;
        //     $trainer_name = $get_user->first_name . " " . $get_user->last_name;
        //     $time_str = date("g:iA", strtotime($value->start_time))." - ".date("g:iA", strtotime($value->end_time));
        //     array_push($event,
        //         Event::create()
        //             ->name("Subject: ".$subject_name.", Trainer: ". $trainer_name)
        //             ->description($time_str)
        //             ->uniqueIdentifier('Training-' . $value->id)
        //             ->createdAt(new DateTime($value->created_at, new \DateTimeZone('Asia/Singapore')))
        //             ->startsAt(new DateTime($value->start_date . ' ' . $value->start_time, new \DateTimeZone('Asia/Singapore')))
        //             ->endsAt(new DateTime($value->start_date . ' ' . $value->end_time, new \DateTimeZone('Asia/Singapore')))
        //     );
        // }

        // $class_data = ClassSchedule::with('subject')->get();

        // foreach ($class_data as $k => $v) {
        //     $get_subject = Subject::where('id', $v->subject->subject_id )->first();
        //     $get_user = User::where('id', $v->subject->teacher_id)->first();
        //     $subject_name = $get_subject->subject;
        //     $teacher_name = $get_user->first_name . " " . $get_user->last_name;
        //     $time_str = date("g:iA", strtotime($v->start_time))." - ".date("g:iA", strtotime($v->end_time));
        //     array_push($event,
        //         Event::create()
        //             ->name("Subject: ".$subject_name.", Trainer: ". $teacher_name)
        //             ->description($time_str)
        //             ->uniqueIdentifier('Class-' . $v->id)
        //             ->createdAt(new DateTime($v->created_at, new \DateTimeZone('Asia/Singapore')))
        //             ->startsAt(new DateTime($v->start_date . ' ' . $v->start_time, new \DateTimeZone('Asia/Singapore')))
        //             ->endsAt(new DateTime($v->start_date . ' ' . $v->end_time, new \DateTimeZone('Asia/Singapore')))
        //     );
        // }

        // $data = Calendar::create('Artbug Calendar')
        //     ->event($event)
        //     ->refreshInterval(5);

        // return $data->get();
        // exit;

        // return response($data->get(), 200, [
        //     'Content-Type' => 'text/calendar',
        //     'Content-Disposition' => 'attachment; filename="my-awesome-calendar.ics"',
        //     'charset' => 'utf-8',
        // ]);
    }
}
