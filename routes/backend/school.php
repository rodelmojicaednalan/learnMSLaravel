<?php

use App\Http\Controllers\School\SubjectController;
use App\Http\Controllers\School\SchoolController;
use App\Http\Controllers\SchoolTeacherController;
use App\Http\Controllers\School\CurriculumsController;
use App\Http\Controllers\School\ProgrammeController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [SchoolController::class, 'dashboard'])->name('dashboard');
Route::get('teachers', [SchoolController::class, 'teachers'])->name('teachers');

Route::post('school-admin/ajax/{section}', [SchoolController::class, 'ajax'])->name('ajax');
Route::resource('teacher', '\App\Http\Controllers\SchoolTeacherController');

Route::post('subjects/ajax/{section}', 'School\SubjectController@ajax');
Route::resource('subject', '\App\Http\Controllers\School\SubjectController');

Route::post('classes/ajax/{section}', 'School\ClassController@ajax');
Route::resource('class', '\App\Http\Controllers\School\ClassController');

Route::get('programme', [ProgrammeController::class, 'index'])->name('programme');
Route::post('programme/ajax/{section}', [ProgrammeController::class, 'ajax']);

Route::get('curriculum', [CurriculumsController::class, 'index'])->name('partners');
Route::post('curriculum/ajax/{section}', [CurriculumsController::class, 'ajax']);





?>
