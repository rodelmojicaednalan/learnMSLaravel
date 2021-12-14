<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
   
	public function checkout()
	{
		$page = 'checkout';
		$page_title = "Checkout";
		return view('frontend.checkout.checkout', compact('page', 'page_title'));
	}
}
