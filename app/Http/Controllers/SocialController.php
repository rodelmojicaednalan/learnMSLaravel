<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialController extends Controller
{
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }


    public function loginWithLinkedin()
    {
        try {

            $user = Socialite::driver('linkedin')->user();

            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                if (!$isUser->linkedin_id) {
                    $isUser->update([
                        'linkedin_id' => $user->id
                    ]);
                }

                Auth::login($isUser);
                return redirect($this->redirectAfterLogin());
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function loginWithTwitter()
    {
        try {

            $user = Socialite::driver('twitter')->user();

            // $userWhere = User::where('twitter_id', $user->id)->first();
            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                if (!$isUser->twitter_id) {
                    $isUser->update([
                        'twitter_id' => $user->id
                    ]);
                }

                Auth::login($isUser);
                return redirect($this->redirectAfterLogin());
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithgoogle()
    {
        try {

            $user = Socialite::driver('google')->user();

            // $finduser = User::where('google_id', $user->id)->first();
            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                if (!$isUser->google_id) {
                    $isUser->update([
                        'google_id' => $user->id
                    ]);
                }

                Auth::login($isUser);
                return redirect($this->redirectAfterLogin());
            }
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            // $isUser = User::where('fb_id', $user->id)->first();
            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                if (!$isUser->fb_id) {
                    $isUser->update([
                        'fb_id' => $user->id
                    ]);
                }

                Auth::login($isUser);
                return redirect($this->redirectAfterLogin());
            }
            // else {
            //     $createUser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'fb_id' => $user->id,
            //         'password' => encrypt('admin@123')
            //     ]);

            //     Auth::login($createUser);
            //     return redirect('/dashboard');
            // }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    private function redirectAfterLogin()
    {
        $url = '';
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

        return $url;
    }
}
