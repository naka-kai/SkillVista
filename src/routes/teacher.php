<?php

use App\Http\Controllers\Teacher\Auth\ForgotPasswordController;
use App\Http\Controllers\Teacher\Auth\LoginController;
use App\Http\Controllers\Teacher\Auth\RegisterController;
use App\Http\Controllers\Teacher\Auth\ResetPasswordController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\ProfileController;
use Illuminate\Support\Facades\Route;

// 教師
// 認証不要
Route::prefix('teacher')->group(function() {
    // ログイン
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('teacher.showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('teacher.login');
    // 登録
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('teacher.showRegistrationForm');
    Route::post('register', [RegisterController::class, 'register'])->name('teacher.register');
});

// ログイン後
Route::middleware('auth:teacher')->prefix('teacher')->name('teacher.')->group(function() {
    // プロフィール
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/{teacherName}', [ProfileController::class, 'show'])->name('show');
    });
    // ログアウト
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // マイコース
    Route::get('/{teacherName}/my-course', [TeacherController::class, 'myCourse'])->name('myCourse');

});