<?php

use App\Http\Controllers\Teacher\Auth\ForgotPasswordController;
use App\Http\Controllers\Teacher\Auth\LoginController;
use App\Http\Controllers\Teacher\Auth\RegisterController;
use App\Http\Controllers\Teacher\Auth\ResetPasswordController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Auth\AuthenticatedSessionController;

// 教師
// 認証不要
Route::prefix('teacher')->group(function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('teacher.showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('teacher.login');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('teacher.showRegistrationForm');
    Route::post('register', [RegisterController::class, 'register'])->name('teacher.register');
});

// 教師
Route::prefix('teacher')->name('teacher.')->group(function() {
    // プロフィール
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/{teacherName}', [ProfileController::class, 'show'])->name('show');
        // Route::get('/edit/{teacherName}', [TeacherProfileController::class, 'edit'])->name('edit');
        // Route::post('/edit-confirm/{teacherName}', [TeacherProfileController::class, 'editConfirm'])->name('editConfirm');
        // Route::put('/{teacherName}', [TeacherProfileController::class, 'update'])->name('update');
    });
    // コース
    Route::prefix('course')->name('course.')->group(function() {
        Route::get('/{teacherName}/my-course', [CourseController::class, 'myCourse'])->name('myCourse');
        Route::get('/create/{teacherName}', [CourseController::class, 'create'])->name('create');
        Route::post('/create-confirm/{teacherName}', [CourseController::class, 'createConfirm'])->name('createConfirm');
        Route::post('/{teacherName}', [CourseController::class, 'store'])->name('store');
        Route::get('edit/{teacherName}/{courseName}', [CourseController::class, 'edit'])->name('edit');
        Route::post('edit-confirm/{teacherName}/{courseName}', [CourseController::class, 'editConfirm'])->name('editConfirm');
        Route::put('/{teacherName}/{courseName}', [CourseController::class, 'update'])->name('update');
        Route::delete('/{teacherName}/{courseName}', [CourseController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('teacher')->name('teacher.')->namespace('teacher')->group(function() {
    // Auth::routes();
});

// Auth::routes();

// Route::view('/teacher/login', 'authTeacher/login');
// Route::post('/teacher/login', [LoginController::class, 'login']);
// Route::post('/teacher/logout', [LoginController::class, 'logout']);
// Route::view('/teacher/register', 'authTeacher/register');
// Route::post('/teacher/register', [LoginController::class, 'register']);
// Route::view('/teacher/top', 'teacher/top')->middleware('auth:teacher');
// Route::view('/teacher/password/reset', 'teacher/password/email');
// Route::post('/teacher/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
// Route::view('/teacher/password/reset/{token}'. [ResetPasswordController::class, 'showResetForm']);
// Route::post('/teacher/password/reset', [ResetPasswordController::class, 'reset']);

// Route::view('/user/login', 'auth/login');
// Route::post('/user/login', [LoginController::class, 'login']);
// Route::post('/user/logout', [LoginController::class, 'logout']);
// Route::view('/user/register', 'auth/register');
// Route::post('/user/register', [LoginController::class, 'register']);
// Route::view('/user/top', 'user/top')->middleware('auth:user');
// Route::view('/user/password/reset', 'user/password/email');
// Route::post('/user/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
// Route::view('/user/password/reset/{token}'. [ResetPasswordController::class, 'showResetForm']);
// Route::post('/user/password/reset', [ResetPasswordController::class, 'reset']);