<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Course routes
Route::middleware('auth')->group(function () {


    // Courses
    Route::resource('courses', CourseController::class)->except(['index', 'show']);

    // Lessons 
    Route::resource('courses.lessons', LessonController::class)->except(['index', 'show']);

    // Enrollment progress 
    Route::get('courses/{course}/progress', [EnrollmentController::class, 'progress'])->name('enrollments.progress');
    Route::post('courses/{course}/progress', [EnrollmentController::class, 'updateProgress'])->name('enrollments.updateProgress');

    // Enroll  course
    Route::post('courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('enrollments.enroll');
});

//  course pages
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/home', [HomeController::class, 'index'])->name('home');