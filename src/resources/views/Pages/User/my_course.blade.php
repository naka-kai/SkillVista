@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    ユーザー マイコース<br>
    <br>
    
    user
    <a href="{{ route('course', ['courseName' => 'courseName']) }}">コース詳細</a>
    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection