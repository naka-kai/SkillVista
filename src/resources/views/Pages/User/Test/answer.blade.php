@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    ユーザー テスト回答<br>
    <br>
    
    user
    <a href="{{ route('testQuestion', ['courseName' => 'courseName', 'testId' => 'testId', 'userId' => 'userId']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection