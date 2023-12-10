@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    ユーザー プロフィール編集<br>
    <br>

    user
    <form action="{{ route('user.profile.editConfirm', ['userName' => 'userName']) }}" method="POST">
        @csrf
        <button type="submit">プロフィール編集確認</button>
    </form>
    <a href="{{ route('user.profile.show', ['userName' => 'userName']) }}">戻る</a>
    <br>

    <a href="{{ route('top') }}">TOPに戻る</a>
</div>
@endsection