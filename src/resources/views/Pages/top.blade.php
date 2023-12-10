@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    トップ<br>
    <br>

    all
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">コース詳細</a>
    <br>

    user
    <a href="{{ route('user.myCourse', ['userName' => 'userName']) }}">マイコース</a>
    <a href="{{ route('user.wishList', ['userName' => 'userName']) }}">欲しいものリスト</a>
    <a href="{{ route('user.profile.show', ['userName' => 'userName']) }}">プロフィール</a>
    <br>
    
    teacher
    <a href="{{ route('teacher.course.myCourse', ['teacherName' => 'teacherName']) }}">マイコース</a>
    <a href="{{ route('teacher.profile.show', ['teacherName' => 'teacherName']) }}">プロフィール</a>
</div>
@endsection