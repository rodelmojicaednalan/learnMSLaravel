<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // register new LoginResponse
        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::registerView(function () {
            return view('auth.user-register');
        });

        Fortify::loginView(function () {
            return view('auth.user-login');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });



        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Add validation to check if the current user account is approved
        // Used for School Account validation
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)
                ->where('is_approved', 1)
                ->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            } else {
                throw ValidationException::withMessages([
                    Fortify::username() => "Username not found or account is inactive.",
                ]);
            }
        });

        // Fortify::authenticateThrough(function (Request $request) {
        //     return array_filter([
        //             config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
        //             AttemptToAuthenticate::class,
        //             PrepareAuthenticatedSession::class,
        //     ]);
        // });
    }
}
