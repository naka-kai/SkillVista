@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    QA詳細<br>
    <br>
    
    user, teacher
    <a href="{{ route('movie', ['courseName' => 'courseName', 'movieId' => 'movieId']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection