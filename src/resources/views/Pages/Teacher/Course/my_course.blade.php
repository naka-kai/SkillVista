@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    教師 マイコース<br>
    <br>
    
    teacher
    <a href="{{ route('teacher.course.create', ['teacherName' => 'teacherName']) }}">コース新規作成</a>
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">コース詳細</a>
    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection