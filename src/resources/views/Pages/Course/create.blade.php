@extends('Layouts.app')

@section('content')
    <div class="flex flex-col">
        教師 コース新規作成<br>
        <br>

        teacher
        <form action="{{ route('teacher.course.createConfirm', ['teacherName' => 'teacherName']) }}" method="POST">
            @csrf
            <button type="submit">コース新規作成確認</button>
        </form>
        <a href="{{ route('teacher.course.myCourse', ['teacherName' => 'teacherName']) }}">戻る</a>
        <br>

        <a href="{{ route('top') }}">TOPに戻る</a>
    </div>
@endsection
