<?php

use App\Http\Controllers\Teacher\Auth\ForgotPasswordController;
use App\Http\Controllers\Teacher\Auth\LoginController;
use App\Http\Controllers\Teacher\Auth\RegisterController;
use App\Http\Controllers\Teacher\Auth\ResetPasswordController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MovieController;


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
        Route::get('/password-complete', [ProfileController::class, 'passwordComp'])->name('passwordComp');
        Route::get('/{teacherName}', [ProfileController::class, 'show'])->name('show');
        Route::put('/{teacherName}', [ProfileController::class, 'update'])->name('update');
    });
    // ログアウト
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // マイコース
    Route::get('/{teacherName}/my-course', [TeacherController::class, 'myCourse'])->name('myCourse');
    // メールアドレス変更
    Route::prefix('email')->name('email.')->group(function() {
        Route::post('/change', [ProfileController::class, 'sendChangeEmailLink'])->name('sendChangeEmailLink');
        Route::get('/reset/{token}', [ProfileController::class, 'reset'])->name('reset');
    });
});

Route::middleware('auth:teacher')->group(function() {
    // コース
    Route::prefix('course')->name('course.')->group(function() {
        Route::get('/create/{teacherName}', [CourseController::class, 'create'])->name('create');
        Route::post('/{teacherName}', [CourseController::class, 'store'])->name('store');
        Route::get('/{teacherName}/{courseName}', [CourseController::class, 'edit'])->name('edit');
        Route::post('/{teacherName}/{courseName}', [CourseController::class, 'update'])->name('update');
        Route::delete('/{teacherName}/{courseName}', [CourseController::class, 'destroy'])->name('destroy');
    });
    // チャプター
    Route::prefix('chapter')->name('chapter.')->group(function() {
        Route::post('/{teacherName}/{courseName}/store', [ChapterController::class, 'store'])->name('store');
        Route::post('/{teacherName}/{courseName}', [ChapterController::class, 'update'])->name('update');
    });
    // 動画
    Route::prefix('movie')->name('movie.')->group(function() {
        Route::post('/{teacherName}/{courseName}/store', [MovieController::class, 'store'])->name('store');
        Route::post('/{teacherName}/{courseName}', [MovieController::class, 'update'])->name('update');
        Route::delete('/{teacherName}/{courseName}', [MovieController::class, 'destroy'])->name('destroy');
    });
});