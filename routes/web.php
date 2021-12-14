<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', 'PagesController@index');
Route::get('/testzoom', 'TestController@testzoom');

Route::get('/dashboard', [PagesController::class, 'dashboard'])->middleware(['auth', 'verified']);

Route::group(['as' => 'admin.', 'prefix' => 'administrator'], function () {
    include(__DIR__ . '/backend/admin.php');
});

Route::group(['as' => 'parent.', 'prefix' => 'parent'], function () {
    include(__DIR__ . '/backend/parent.php');
});

Route::group(['as' => 'teacher.', 'prefix' => 'teacher'], function () {
    include(__DIR__ . '/backend/teacher.php');
});

Route::group(['as' => 'trainer.', 'prefix' => 'trainer'], function () {
    include(__DIR__ . '/backend/trainer.php');
});

Route::group(['as' => 'school-admin.', 'prefix' => 'school-admin'], function () {
    include(__DIR__ . '/backend/school.php');
});


Route::get('/roles_permissions', [AuthController::class, 'roles_permissions']);

// Demo routes
Route::get('/datatables', [PagesController::class, 'datatables']);
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

// Calendar Routes
Route::get('/calendar/generate', 'CalendarController@generate');

Route::get('/test', 'TestController@index');

// Frontend General Pages
Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/about', 'FrontEndController@about')->name('about');
Route::get('/how-to-learn', 'FrontEndController@howToLearn')->name('how-to-learn');
Route::get('/classes', 'FrontEndController@classes')->name('classes');
Route::post('/load_parent_category', 'FrontEndController@load_parent_category')->name('load_parent_category');
Route::post('/load_children_category', 'FrontEndController@load_children_category')->name('load_children_category');
Route::post('/classes/ajax/{page}', 'FrontEndController@class_listing');

Route::get('/how-to-teach', 'FrontEndController@howToTeach')->name('how-to-teach');
Route::get('/curriculum', 'FrontEndController@curriculum')->name('curriculum');
Route::get('/teacher-handbook', 'FrontEndController@teacherHandbook')->name('teacher-handbook');
Route::get('/collaborate-with-us', 'FrontEndController@collaborateWithUs')->name('collaborate-with-us');
Route::get('/contact', 'FrontEndController@contact')->name('contact');
Route::get('/cart/{id}', 'Frontend\CartController@cart')->name('cart');
Route::post('/cart/ajax/{section}', 'Frontend\CartController@ajax');
Route::get('/checkout', 'Frontend\CheckoutController@checkout')->name('checkout');
Route::post('/curriculum/ajax/{page}', 'FrontEndController@curriculum_listing');

Route::get('/school/profile', 'Frontend\SchoolProfileController@index')->name('school.profile');
Route::get('/school/pre-recorded-class-detail', 'FrontEndController@schoolPreRecordedClassDetail')->name('school.pre.recorded.class.detail');
Route::get('/school/live-class-detail', 'FrontEndController@schoolLiveClassDetail')->name('school.live.class.detail');
Route::post('/school/profile/ajax/{section}', 'Frontend\SchoolProfileController@ajax');
Route::get('/school/{id}', 'FrontEndController@frontendSchoolProfile')->name('frontend.school.profile');
Route::post('/school/ajax/{page}', 'FrontEndController@teacherPagination');

Route::get('/class/live/ajax/{section}/{id}', 'FrontendController@ajax');
Route::get('/class/live/{id}', 'FrontendController@teacherLiveClassDetail')->name('teacher.live.class.detail');
Route::get('/class/pre-recorded/{id}', 'FrontendController@teacherPreRecordedClassDetail')->name('teacher.pre.recorded.class.detail');
Route::get('/teacher/profile', 'Frontend\TeacherProfileController@index')->name('teacher.profile');
Route::get('teacher/frontend/calendar', 'Frontend\TeacherProfileController@calendar')->name('teacher.frontend.calendar');
Route::post('/teacher/profile/ajax/{section}', 'Frontend\TeacherProfileController@ajax');
Route::get('/teacher/frontend/dashboard', 'Frontend\TeacherProfileController@dashboard')->name('teacher.frontend.dashboard');
Route::get('/teacher/frontend/result', 'Frontend\TeacherProfileController@result')->name('teacher.frontend.result');
Route::get('/teacher/frontend/curriculum-pre-recorded', 'Frontend\TeacherProfileController@CurriculumPreRecorded')->name('teacher.frontend.curriculum.pre.recorded');
Route::get('/teacher/meetings', 'Frontend\TeacherProfileController@meetings')->name('teacher.meetings');
// Class Management
Route::post('/teacher/class/ajax/{section}', 'Frontend\Teacher\ClassesController@ajax');
// Route::get('/teacher/classes_ajax/{section}', 'Frontend\Teacher\ClassesController@classes_ajax');

Route::get('/parent/profile', 'Frontend\ParentProfileController@index')->name('parent.profile');
Route::get('parent/frontend/calendar', 'Frontend\ParentProfileController@calendar')->name('parent.frontend.calendar');
Route::post('/parent/profile/ajax/{section}', 'Frontend\ParentProfileController@ajax');
Route::get('/parent/frontend/dashboard', 'Frontend\ParentProfileController@dashboard')->name('parent.frontend.dashboard');
Route::get('/parent/frontend/result', 'Frontend\ParentProfileController@result')->name('parent.frontend.result');
Route::get('/parent/frontend/class-pre-recorded', 'Frontend\ParentProfileController@ClassPreRecorded')->name('parent.frontend.class.pre.recorded');
Route::post('/register_user/ajax/{section}', 'Frontend\RegisterController@ajax')->name('register_user');

Route::get('/teacher/{id}', 'Frontend\SchoolTeacherProfileController@index')->name('school_teacher_profile');

// Social Login
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
Route::get('auth/google', [SocialController::class, 'googleRedirect']);
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);
Route::get('auth/twitter', [SocialController::class, 'twitterRedirect']);
Route::get('auth/twitter/callback', [SocialController::class, 'loginWithTwitter']);
Route::get('auth/linkedin', [SocialController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [SocialController::class, 'loginWithLinkedin']);
//Mailing

Route::get('/email', function () {
    return new WelcomeMail("nice","hello");
});

Route::get('/clear-app', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

    return 'Clear App';
});
