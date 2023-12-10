@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    ユーザー プロフィール<br>
    <br>
    
    user
    <a href="{{ route('user.profile.edit', ['userName' => 'userName']) }}">プロフィール編集</a>
    <a href="{{ route('top') }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection