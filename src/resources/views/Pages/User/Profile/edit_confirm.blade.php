@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    ユーザー プロフィール編集確認<br>
    <br>
    
    user
    <form action="{{ route('user.profile.update', ['userName' => 'userName']) }}" method="POST">
        @method('PUT')
        @csrf
        <button type="submit">プロフィール編集完了</button>
    </form>
    <a href="{{ route('user.profile.edit', ['userName' => 'userName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection