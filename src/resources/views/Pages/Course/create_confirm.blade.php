@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    教師 コース新規作成確認<br>
    <br>
    
    teacher
    <form action="{{ route('teacher.course.store', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}" method="POST">
        @csrf
        <button type="submit">コース新規作成完了</button>
    </form>
    <a href="{{ route('teacher.course.create', ['teacherName' => 'teacherName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection