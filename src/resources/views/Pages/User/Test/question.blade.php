@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    ユーザー テスト問題<br>
    <br>
    
    user
    <a href="{{ route('testAnswer', ['courseName' => 'courseName', 'testId' => 'testId']) }}">テスト回答</a>
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection