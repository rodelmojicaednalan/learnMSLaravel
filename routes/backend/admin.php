<?php

use App\Http\Controllers\Admin\CurriculumsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\PaymentTransactionsController;
use App\Http\Controllers\Admin\PublicClassesController;
use App\Http\Controllers\Admin\RequirementsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\LevelsController;
use App\Http\Controllers\Admin\TrainingSchedulesController;
use App\Http\Controllers\Admin\UserRolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\GradingRequestController;
use App\Http\Controllers\Admin\CategoriesController;
// use App\Http\Controllers\School\SchoolController;
use App\Http\Controllers\Admin\SchoolController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('users', [UsersController::class, 'index'])->name('users');
Route::post('users/ajax/{section}', [UsersController::class, 'ajax']);

Route::get('curriculum', [CurriculumsController::class, 'index'])->name('curriculum');
Route::post('curriculum/ajax/{section}', [CurriculumsController::class, 'ajax']);

Route::get('training-schedules', [TrainingSchedulesController::class, 'index'])->name('training-schedules');
Route::get('training-schedules/meeting/', [TrainingSchedulesController::class, 'meeting']);
Route::post('training-schedules/ajax/{section}', [TrainingSchedulesController::class, 'ajax']);

Route::get('partners', [PartnersController::class, 'index'])->name('partners');
Route::post('partners/ajax/{section}', [PartnersController::class, 'ajax']);


Route::get('payment-transaction', [PaymentTransactionsController::class, 'index'])->name('payment-transaction');
Route::post('payment-transaction/ajax/{section}', [PaymentTransactionsController::class, 'ajax']);

Route::get('grading-request', [GradingRequestController::class, 'index'])->name('grading-request');
Route::post('grading-request/ajax/{section}', [GradingRequestController::class, 'ajax']);


Route::get('artbug-classes', [PublicClassesController::class, 'index'])->name('public-classes');
Route::get('artbug-classes/meeting', [PublicClassesController::class, 'meeting']);
Route::post('artbug-classes/ajax/{section}', [PublicClassesController::class, 'ajax']);

Route::get('settings/user-roles', [UserRolesController::class, 'index'])->name('user-roles');
Route::post('settings/ajax/{section}', [UserRolesController::class, 'ajax']);

// Route::get('settings/categories', [CategoriesController::class, 'index'])->name('categories');
// Route::post('settings/categories/ajax/{section}', [CategoriesController::class, 'ajax']);


Route::get('settings/categories', [CategoriesController::class, 'index'])->name('categories');
Route::post('settings/categories/ajax/{section}', [CategoriesController::class, 'ajax']);


Route::get('settings/levels', [LevelsController::class, 'index'])->name('subjects');
Route::post('settings/levels/ajax/{section}', [LevelsController::class, 'ajax']);


Route::get('settings/requirements', [RequirementsController::class, 'index'])->name('requirements');

Route::get('child', [ChildController::class, 'index'])->name('child');
Route::post('child/ajax/{section}', [ChildController::class, 'ajax']);

Route::get('school', [PublicClassesController::class, 'index'])->name('public-classes');
Route::post('school/ajax/{section}', [PublicClassesController::class, 'ajax']);

Route::get('school',  [SchoolController::class, 'index']);
Route::post('school/ajax/{section}', [SchoolController::class, 'ajax']);




