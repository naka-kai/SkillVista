@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    教師 プロフィール編集<br>
    <br>

    <form action="{{ route('teacher.profile.editConfirm', ['teacherName' => 'teacherName']) }}" method="POST">
        @csrf
        <button type="submit">コース編集確認</button>
    </form>
    <a href="{{ route('teacher.profile.show', ['teacherName' => 'teacherName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection