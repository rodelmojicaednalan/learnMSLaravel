<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use Omnipay\Omnipay;
use Response;

use App\Models\Lesson;
use App\Models\PaymentTransaction;
use App\Models\TrainingApplicant;
use App\Models\TeacherLevel;
use App\Models\TrainingSchedule;
use Zoom;

class PaymentTransactionsController extends Controller
{
	public function __construct()
	{
	    $this->middleware(['auth','role:teacher']);
	}

    public function index()
    {
        $page_title = 'Payment Transactions';
        $page_description = '';

        return view('backend.teacher.payment-transactions.index', compact('page_title', 'page_description'));
    }

    public function pricing(Request $request)
    {
        $data['page_title'] = 'Checkout';

        $training_id = $request->training_id;

        $training = Training::with('schedule', 'user' , 'subject')->where('id',$training_id)->first();

        if(!empty($training))
        {

            if(!empty($training->subject))
            {
            // print_r($training->subject);

                // try {

                //     /** $training->subject->fee * 100 because price in payment gateway usually are in cents */
                //     $checkout = Auth::user()->checkoutCharge($training->subject->fee * 100, $training->subject->subject, 1, [
                //         'success_url' => route('teacher.pricing'),
                //         'cancel_url' => route('teacher.pricing'),
                //     ]);

                //     print_r($checkout);
                // } catch (IncompletePayment $exception) {
                //     return redirect()->route(
                //         'cashier.payment',
                //         [$exception->payment->id, 'redirect' => route('teacher.pricing')]
                //     );
                // }

                // $data['checkout'] = $checkout;
                $data['training'] = $training;
                $data['subject'] = $training->subject;
                return view('payment.pricing')->with($data);

            }else
            {
                #invalid subject
                return redirect('teacher/training-schedule');
            }

        }else
        {
            return redirect('teacher/training-schedule');
        }

    }

    public function paymentSubmit(Request $request) {
        if(!$request->ajax()){
            return redirect("");
        }

        $gateway = Omnipay::create('Stripe\PaymentIntents');

        $gateway->initialize([
            'apiKey' => config('payment.stripe_secret'),
        ]);

        // Payment variables
        $email = auth()->user()->email;
        $name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $training_object = Training::find(request()->training_id);
        $subject_fee = $training_object->subject->fee;

        $response = $gateway->purchase(
            [
                'amount' => $subject_fee,
                'currency' => 'SGD',
                'token' => request()->stripeToken,
                'confirm' => true,
                'returnUrl' => request()->return_url,
                'metadata' => [
                    'name' => $name,
                    'email' => $email,
                    'payment_type' => 'Training',
                    'user_type' => 'Teacher',
                    'subject_name' => request()->subject_name
                ]
            ]
        )->send();



        if ($response->isSuccessful()) {

            $payment_details = $response->getData();

            $data = [
                'training_id' => request()->training_id,
                'training_slot' => 1,
                'transaction_id' => $payment_details['id'],
                'transaction_type' => 'training',
                'transaction_type_readable_name' => 'Training',
                'subject_name' => request()->subject_name,
                'description' => 'Training - ' . request()->subject_name,
                'amount' => $subject_fee,
                'user_id' => Auth::user()->id,
                'user_email' => Auth::user()->email,
                'user_first_name' => Auth::user()->first_name,
                'user_last_name' => Auth::user()->last_name,
                'payment_date' => now(),
            ];

            $update = $this->updateTrainingDetails($data);
            $payment_transactions = $this->updatePaymentTransactions($data);
            $add_participant = $this->addParticipant($data);

            return response()->json([
                'success' => true,
                'return_url' => request()->return_url,
                'message' => 'Enrolled Successfully'
            ], 200);

        }else{

            return response()->json([
                'success' => false,
                'message' => 'Payment Error'
            ], 500);
        }


    }

    public function addParticipant($data, $test = true) {

        if(!$test) {
            $training = TrainingSchedule::where('training_id', $data['training_id'])->first();
            $get_meeting = Zoom::meeting()->find($training->meeting_id); //meeting_id on training schedule

            $registrant = $get_meeting->registrants()->create([
                'email' => $data['user_email'],
                'first_name' => $data['user_first_name'],
                'last_name' => $data['user_last_name'],
            ]);
        }

    }

    public function updatePaymentTransactions($data) {

        $update = PaymentTransaction::create($data);

        return $update;

    }

    public function updateTrainingDetails($data) {
        if (Auth::check()) {

            if(Auth::user()->hasRole('teacher')) {

                $training_applicant = TrainingApplicant::where('training_id', $data['training_id'])->get();
                $training_count = $training_applicant->count();

                $check_if_enrolled = TrainingApplicant::where('training_id', $data['training_id'])->where('user_id',  Auth::user()->id)->get();

                $av_slots = $data['training_slot'] - $training_count;

                // if($av_slots <= 0)
                // {
                //     return Response::json(array('error'=>true , 'message'=>'','errors'=>['No slots available']));
                // }
                // else if($check_if_enrolled->isNotEmpty())
                // {
                //     return Response::json(array('error'=>true , 'message'=>'','errors'=>['You already enrolled in this training']));
                // }
                // else {

                $insert_applicant = TrainingApplicant::create([
                    'training_id' => $data['training_id'],
                    'user_id' =>  Auth::user()->id,
                ]);

                $update_level = TeacherLevel::where('user_id', Auth::user()->id)
                                ->update(['level' => 1]);


                // }
                return true;
                // return Response::json(array('error'=>false , 'message'=>'Enrolled Successfully'));
            }
        }

        else{
            return false;
            // return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
        }
    }

    public function training_checkout(Request $request)
    {

       $training_id = $request->training_id;

        $training = Training::with('schedule', 'user' , 'subject')->where('id',$training_id)->first();

        if(!empty($training))
        {

            if(!empty($training->subject))
            {
            // print_r($training->subject);

                try {

                    /** $training->subject->fee * 100 because price in payment gateway usually are in cents */
                    $checkout = Auth::user()->checkoutCharge($training->subject->fee * 100, $training->subject->subject, 1,
                        [
                            'success_url' => route('teacher.pricing'),
                            'cancel_url' => route('teacher.pricing')
                        ]);

                    return json_encode(['id' => $checkout->id]);
                } catch (IncompletePayment $exception) {
                    return redirect()->route(
                        'cashier.payment',
                        [$exception->payment->id, 'redirect' => route('teacher.pricing')]
                    );
                }

                // $data['checkout'] = $checkout;
                // $data['training'] = $training;
                // $data['subject'] = $training->subject;
                // return view('payment.pricing')->with($data);

            }else
            {
                #invalid subject
                return redirect('teacher/training-schedule');
            }

        }
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'list':
    				$users = PaymentTransaction::where('user_id', Auth::user()->id)->get();

    				// $arr[] = ['date'=>'05 Feb 2021' ,'description'=> "Sign up fee: James Doe", 'amount' => "$500"];
    				// $arr[] = ['date'=>'07 Feb 2021' , 'description'=> "Sign up fee: Johnny", 'amount'=> "$650"];

    				// echo 'test';

    				return response()->json($users);
    			break;

    		default:

    			break;
    	}
    }
}
