<?php



use App\Http\Controllers\Teacher\CurriculumsController;

use App\Http\Controllers\Teacher\DashboardController;

use App\Http\Controllers\Teacher\JobOpeningsController;

use App\Http\Controllers\Teacher\PaymentTransactionsController;

use App\Http\Controllers\Teacher\PrivateClassesController;

use App\Http\Controllers\Teacher\StudentsController;

use App\Http\Controllers\Teacher\TrainingSchedulesController;

use App\Http\Middleware\IsValidTeacher;

Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('schedule', [DashboardController::class, 'schedule'])->name('schedule');

// Prevent user to access the routes using url
Route::middleware([IsValidTeacher::class])->group(function () {

    Route::get('curriculum', [CurriculumsController::class, 'index']);
    Route::post('curriculum/ajax/{section}', [CurriculumsController::class, 'ajax']);

    Route::get('private-classes', [PrivateClassesController::class, 'index'])->name('private.classes');
    Route::get('private-classes/meeting', [PrivateClassesController::class, 'meeting']);
    Route::post('private-classes/ajax/{section}', [PrivateClassesController::class, 'ajax']);

    Route::get('students', [StudentsController::class, 'index']);
    Route::post('students/ajax/{section}', [StudentsController::class, 'ajax']);

    Route::get('job-openings', [JobOpeningsController::class, 'index']);
    Route::post('job-openings/ajax/{section}', [JobOpeningsController::class, 'ajax']);

    Route::get('payment-transactions', [PaymentTransactionsController::class, 'index']);
    Route::post('payment-transactions/ajax/{section}', [PaymentTransactionsController::class, 'ajax']);

});


Route::get('training-schedule', [TrainingSchedulesController::class, 'index'])->name('training.schedule');
Route::get('training-schedule/meeting/', [TrainingSchedulesController::class, 'meeting']);
Route::post('training-schedule/ajax/{section}', [TrainingSchedulesController::class, 'ajax']);


Route::get('pricing', [PaymentTransactionsController::class, 'pricing'])->name('pricing');
Route::post('payment/submit', [PaymentTransactionsController::class, 'paymentSubmit'])->name('payment.submit');
Route::post('training/checkout', [PaymentTransactionsController::class, 'training_checkout'])->name('checkout-training');
