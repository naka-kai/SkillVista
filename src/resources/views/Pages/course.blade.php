@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    コース詳細<br>
    <br>
    
    all
    <a href="{{ route('movie', ['courseName' => 'courseName', 'movieId' => 'movieId']) }}">動画詳細</a>
    <a href="{{ route('top') }}">TOPに戻る</a>
    <br>
    
    user
    <a href="{{ route('testQuestion', ['courseName' => 'courseName', 'testId' => 'testId', 'userId' => 'userId']) }}">テスト問題</a>
    <a href="{{ route('user.myCourse', ['userName' => 'userName']) }}">マイコースに戻る</a>
    <a href="{{ route('user.wishList', ['userName' => 'userName']) }}">欲しいものリストに戻る</a>
    <br>
    
    teacher
    <a href="{{ route('teacher.course.edit', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}">コース編集</a>
    <a href="{{ route('teacher.course.myCourse', ['teacherName' => 'teacherName']) }}">マイコースに戻る</a>
</div>
@endsection