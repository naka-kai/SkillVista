<?php

use App\Http\Controllers\TopController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\TestController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisterController;

// ユーザー
// 認証不要
Route::prefix('user')->group(function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('user.login');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('user.showRegistrationForm');
    Route::post('register', [RegisterController::class, 'register'])->name('user.register');
});

// ログイン後
Route::middleware('auth:user')->group(function() {
    Route::post('/top', [TopController::class, 'top']);
});
Route::middleware('auth:user')->prefix('user')->name('user.')->group(function() {
    // パスワードリセット
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    // ログアウト
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // マイコース
    Route::get('/{userName}/my-course', [UserController::class, 'myCourse'])->name('myCourse');
    // 欲しいものリスト
    Route::get('/{userName}/wish-list', [UserController::class, 'wishList'])->name('wishList');
    // プロフィール
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/{userName}', [ProfileController::class, 'show'])->name('show');
        // Route::get('/edit/{userName}', [UserProfileController::class, 'edit'])->name('edit');
        // Route::post('/edit-confirm/{userName}', [UserProfileController::class, 'editConfirm'])->name('editConfirm');
        // Route::put('/{userName}', [UserProfileController::class, 'update'])->name('update');
    });
    // テスト回答
    Route::get('/{courseName}/test/{testId}/answer', [TestController::class, 'testAnswer'])->name('testAnswer');
    // テスト問題
    Route::get('/{courseName}/test/{testId}/{userId}', [TestController::class, 'testQuestion'])->name('testQuestion');
});

// Route::prefix('user')->name('user.')->namespace('user')->group(function() {
//     Auth::routes();
// });

// Auth::routes();

// Route::view('/teacher/login', 'authTeacher/login');
// Route::post('/teacher/login', [TeacherLoginController::class, 'login']);
// Route::post('/teacher/logout', [TeacherLoginController::class, 'logout']);
// Route::view('/teacher/register', 'authTeacher/register');
// Route::post('/teacher/register', [TeacherLoginController::class, 'register']);
// Route::view('/teacher/top', 'teacher/top')->middleware('auth:teacher');
// Route::view('/teacher/password/reset', 'teacher/password/email');
// Route::post('/teacher/password/email', [TeacherForgotPasswordController::class, 'sendResetLinkEmail']);
// Route::view('/teacher/password/reset/{token}'. [TeacherResetPasswordController::class, 'showResetForm']);
// Route::post('/teacher/password/reset', [TeacherResetPasswordController::class, 'reset']);

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