<?php

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

 function cart_count($id)
	{
		$cart = Cart::where('user_id' , $id )->get();
        return $cart;
	}

?>