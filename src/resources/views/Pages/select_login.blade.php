@extends('layouts.app')

@section('content')
<div class="my-20 py-10 flex flex-col justify-center items-center w-[500px] mx-auto">
    <div class="mb-10">
        <a href="{{ route('user.showLoginForm') }}" class="px-6 py-3 font-medium text-white duration-300 bg-blue-600 rounded-lg hover:opacity-70 border border-blue-600 block cursor-pointer w-[200px] text-center">
            ユーザーログイン
        </a>
    </div>
    <div>
        <a href="{{ route('teacher.showLoginForm') }}" class="px-6 py-3 font-medium text-blue-600 duration-300 bg-white rounded-lg hover:opacity-70 border border-blue-600 block cursor-pointer w-[200px] text-center">
            教師ログイン
        </a>
    </div>
</div>
@endsection
