<?php

use App\Http\Controllers\Parent\ClassesController;
use App\Http\Controllers\Parent\DashboardController;
use App\Http\Controllers\Parent\PaymentTransactionsController;
use App\Http\Controllers\Parent\ChildController;



Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('schedule', [DashboardController::class, 'schedule'])->name('schedule');

Route::get('classes', [ClassesController::class, 'index'])->name('classes');
Route::get('artbug-classes/meeting', [ClassesController::class, 'meeting'])->name('classes.meeting');
Route::post('classes/ajax/{section}', [ClassesController::class, 'ajax']);

Route::get('payment-transactions', [PaymentTransactionsController::class, 'index'])->name('payment-transactions');
Route::post('payment-transaction/ajax/{section}', [PaymentTransactionsController::class, 'ajax']);

Route::get('child', [ChildController::class, 'index'])->name('child');
Route::post('child/ajax/{section}', [ChildController::class, 'ajax']);

Route::get('pricing', [PaymentTransactionsController::class, 'pricing'])->name('pricing');
Route::post('payment/submit', [PaymentTransactionsController::class, 'paymentSubmit'])->name('payment.submit');




