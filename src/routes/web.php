<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QaController;
use App\Http\Controllers\Teacher\CourseController as TeacherCourseController;
use App\Http\Controllers\Teacher\ProfileController as TeacherProfileController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\TestController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 誰でも閲覧可能だが部分によってはauth必要
Route::get('/', [TopController::class, 'top'])->name('top');

// ユーザー、教師共通
// Route::middleware('auth:user, auth:teacher')->group(function() {
    // コース詳細
    Route::get('/course/{courseName}', [CourseController::class, 'show'])->name('course');
    // 動画詳細
    Route::get('/movie/{courseName}/{movieId}', [MovieController::class, 'show'])->name('movie');
    // QA詳細
    Route::get('/qa/{courseName}/{qaId}/{answerId}', [QaController::class, 'show'])->name('qa.show');
// });

// ユーザー
// テスト回答
Route::get('/{courseName}/test/{testId}/answer', [TestController::class, 'testAnswer'])->name('testAnswer');
// テスト問題
Route::get('/{courseName}/test/{testId}/{userId}', [TestController::class, 'testQuestion'])->name('testQuestion');

Route::prefix('user')->name('user.')->group(function() {
    // マイコース
    Route::get('/{userName}/my-course', [UserController::class, 'myCourse'])->name('myCourse');
    // 欲しいものリスト
    Route::get('/{userName}/wish-list', [UserController::class, 'wishList'])->name('wishList');
    // プロフィール
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/{userName}', [UserProfileController::class, 'show'])->name('show');
        Route::get('/edit/{userName}', [UserProfileController::class, 'edit'])->name('edit');
        Route::post('/edit-confirm/{userName}', [UserProfileController::class, 'editConfirm'])->name('editConfirm');
        Route::put('/{userName}', [UserProfileController::class, 'update'])->name('update');
    });
});

// 教師
Route::prefix('teacher')->name('teacher.')->group(function() {
    // プロフィール
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/{teacherName}', [TeacherProfileController::class, 'show'])->name('show');
        Route::get('/edit/{teacherName}', [TeacherProfileController::class, 'edit'])->name('edit');
        Route::post('/edit-confirm/{teacherName}', [TeacherProfileController::class, 'editConfirm'])->name('editConfirm');
        Route::put('/{teacherName}', [TeacherProfileController::class, 'update'])->name('update');
    });
    // コース
    Route::prefix('course')->name('course.')->group(function() {
        Route::get('/{teacherName}/my-course', [TeacherCourseController::class, 'myCourse'])->name('myCourse');
        Route::get('/create/{teacherName}', [TeacherCourseController::class, 'create'])->name('create');
        Route::post('/create-confirm/{teacherName}', [TeacherCourseController::class, 'createConfirm'])->name('createConfirm');
        Route::post('/{teacherName}', [TeacherCourseController::class, 'store'])->name('store');
        Route::get('edit/{teacherName}/{courseName}', [TeacherCourseController::class, 'edit'])->name('edit');
        Route::post('edit-confirm/{teacherName}/{courseName}', [TeacherCourseController::class, 'editConfirm'])->name('editConfirm');
        Route::put('/{teacherName}/{courseName}', [TeacherCourseController::class, 'update'])->name('update');
        Route::delete('/{teacherName}/{courseName}', [TeacherCourseController::class, 'destroy'])->name('destroy');
    });
});