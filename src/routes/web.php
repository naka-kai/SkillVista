<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CoursecategoryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\TestController;
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

// 誰でも閲覧可能
// ログイン選択
Route::get('/select-login', [TopController::class, 'selectLogin'])->name('selectLogin');
// コース詳細
Route::get('/course/{courseName}', [CourseController::class, 'show'])->name('course');
// 教師詳細
Route::get('/teacher_presentation/{teacherName}', [TeacherController::class, 'show'])->name('teacher');
// カテゴリー一覧
Route::get('/course/category/{categoryName}', [CoursecategoryController::class, 'show'])->name('category');

// 誰でも閲覧可能だが部分によってはauth必要(ログインしたら見えるマイコースなど)
// TOPページ
Route::get('/top', [TopController::class, 'top'])->name('top');

// ユーザー、教師共通
Route::middleware('auth:user,teacher')->group(function() {
    // 動画詳細
    Route::get('/movie/{teacherName}/{courseName}/{movieId}', [MovieController::class, 'show'])->name('movie');
    // コメント詳細
    Route::get('/comment/{courseName}/{commentId}', [CommentController::class, 'show'])->name('comment.show');
    // テスト回答
    Route::get('/{courseName}/test/{testId}/answer', [TestController::class, 'testAnswer'])->name('testAnswer');
    // テスト問題
    Route::get('/{courseName}/test/{testId}/{userId}', [TestController::class, 'testQuestion'])->name('testQuestion');
});

require __DIR__ . '/user.php';
require __DIR__ . '/teacher.php';