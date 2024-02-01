@extends('Layouts.app')

@section('content')
    <div class="flex flex-col">
        教師 コース編集確認<br>
        <br>

        teacher
        <form action="{{ route('teacher.course.update', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}"
            method="POST">
            @method('PUT')
            @csrf
            <button type="submit">プロフィール編集完了</button>
        </form>
        <a href="{{ route('teacher.course.edit', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}">戻る</a>
        <br>

        <a href="{{ route('top') }}">TOPに戻る</a>
    </div>
@endsection
