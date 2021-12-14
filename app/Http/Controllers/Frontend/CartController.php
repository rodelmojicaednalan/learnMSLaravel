<?php

namespace App\Http\Controllers\Frontend;

use Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\OrcaClass;
use App\Models\Cart;
use App\Models\mdCountry;
use App\Models\OrcaClassLiveClassSchedule;
use App\Models\OrcaCategory;
use App\Models\User;
use App\Models\School;

class CartController extends Controller
{

	public function ajax($section , Request $request){
		switch ($section) {
			case 'remove':
				return $this->ItemRemoveCart($request);
				break;

			case 'get_content_cart':
				return $this->getContentCart($request);
				break;
			
			default:
				break;
		}

	}
    //
	public function cart($id)
	{
		$page = 'cart';
		$page_title = "Cart";
		// $class = OrcaClass::find($id);
		$countries = mdCountry::all();
		$cart = Cart::where('user_id' , $id)->get();
		// $sched_count = OrcaClassLiveClassSchedule::all();
		// dd(count($cart));
		return view('frontend.cart.cart', compact('page', 'cart', 'cart', 'page_title'));
	}

	public function count()
	{
		// $page = 'cart';
		// $page_title = "Cart";
		// // $class = OrcaClass::find($id);
		// $countries = mdCountry::all();
		$cart = Cart::where('user_id' , '15' )->get();
		$count = count($cart);
		// $sched_count = OrcaClassLiveClassSchedule::all();
		// dd($cart[0]->class_details->creator->fullname);
		return view('frontend.includes.header', compact('page', 'cart', 'cart', 'page_title'));
	}

	public function ItemRemoveCart($request){

		// dd($request);

		try {

            DB::beginTransaction();

            $cart = Cart::find($request->id)->delete();

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

	public function getContentCart($request)
	{
		// dd($request->id);
		$page = 'cart';
		$page_title = "Cart";
		$countries = mdCountry::all();
		$cart = Cart::where('user_id' , auth()->user()->id)->get();
		// dd(count($cart));
		return view('frontend.cart.include._getContentCart', compact('page', 'page_title', 'cart', 'page_title'));
	}


}
