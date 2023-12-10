@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    教師 コース編集<br>
    <br>
    
    teacher
    <form action="{{ route('teacher.course.editConfirm', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}" method="POST">
        @csrf
        <button type="submit">コース編集確認</button>
    </form>
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection