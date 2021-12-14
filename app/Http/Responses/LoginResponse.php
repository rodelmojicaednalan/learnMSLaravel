<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $url = '';
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        if (Auth::check()) {

            if (Auth::user()->hasRole('administrator')) {
                $url = '/administrator/dashboard';
            } else if (Auth::user()->hasRole('teacher')) {
                $url = '/teacher/profile';
            } else if (Auth::user()->hasRole('trainer')) {
                $url = '/trainer/dashboard';
            } else if (Auth::user()->hasRole('parent')) {
                $url = '/parent/profile';
            } else if (Auth::user()->hasRole('school_administrator')) {
                $url = '/school/profile';
            } else {
                $url = config('fortify.home');;
            }
        }

        return $request->wantsJson()
            ? response()->json([
                'two_factor' => false,
                'redirection_url' => $url
            ])
            : redirect()->intended($url);
    }
}
