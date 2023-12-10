@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    教師 プロフィール<br>
    <br>

    teacher
    <a href="{{ route('teacher.profile.edit', ['teacherName' => 'teacherName']) }}">プロフィール編集</a>
    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection