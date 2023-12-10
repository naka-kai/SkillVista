@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    動画詳細<br>
    <br>
    
    all
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">戻る</a>
    
    user, teacher
    <a href="{{ route('comment.show', ['answerId' => 'answerId', 'courseName' => 'courseName', 'commentId' => 'commentId']) }}">コメント詳細</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection