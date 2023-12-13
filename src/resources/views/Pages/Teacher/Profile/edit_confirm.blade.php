@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    教師 プロフィール編集確認<br>
    <br>

    teacher
    <form action="{{ route('teacher.profile.update', ['teacherName' => 'teacherName']) }}" method="POST">
        @method('PUT')
        @csrf
        <button type="submit">プロフィール編集完了</button>
    </form>
    <a href="{{ route('teacher.profile.edit', ['teacherName' => 'teacherName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection