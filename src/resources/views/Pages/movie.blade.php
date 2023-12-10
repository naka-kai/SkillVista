@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    動画詳細<br>
    <br>
    
    all
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">戻る</a>
    
    user, teacher
    <a href="{{ route('qa.show', ['answerId' => 'answerId', 'courseName' => 'courseName', 'qaId' => 'qaId']) }}">質問詳細</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection