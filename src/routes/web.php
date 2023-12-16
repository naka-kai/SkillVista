<?php

require __DIR__ . '/user.php';
require __DIR__ . '/teacher.php';

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopController;
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

// 誰でも閲覧できる
Route::get('/select-login', [TopController::class, 'selectLogin'])->name('selectLogin');
// コース詳細
Route::get('/course/{courseName}', [CourseController::class, 'show'])->name('course');
// 動画詳細
Route::get('/movie/{courseName}/{movieId}', [MovieController::class, 'show'])->name('movie');
// 教師詳細
Route::get('/teacher/{teacherName}', [TeacherController::class, 'show'])->name('teacher');

// 誰でも閲覧可能だが部分によってはauth必要(ログインしたら見えるマイコースなど)
// TOPページ
Route::get('/top', [TopController::class, 'top'])->name('top');

// ユーザー、教師共通
// Route::middleware('auth:user, auth:teacher')->group(function() {
    // コメント詳細
    Route::get('/comment/{courseName}/{commentId}/{answerId}', [CommentController::class, 'show'])->name('comment.show');
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