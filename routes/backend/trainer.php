<?php

use App\Http\Controllers\Trainer\DashboardController;
use App\Http\Controllers\Trainer\LessonsController;
use App\Http\Controllers\Trainer\StudentGradingController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('lessons', [LessonsController::class, 'index'])->name('lessons');
Route::get('lessons/meeting/', [LessonsController::class, 'meeting']);
Route::post('lessons/ajax/{section}', [LessonsController::class, 'ajax']);


Route::get('student-grading', [StudentGradingController::class, 'index'])->name('student-grading');
Route::post('student-grading/ajax/{section}', [StudentGradingController::class, 'ajax']);
