@extends('Layouts.app')

@section('content')

<div class="my-10">
    <p>下記のURLをクリックして新しいメールアドレスを確定してください。</p>
    <p>
        {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
    </p>
    <p>※URLの有効期限は1時間以内です。有効期限が切れた場合は、お手数ですが最初からお手続きを行なってください。</p>
</div>
@endsection