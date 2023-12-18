@extends('layouts.app')

@section('content')
<div class="bg-white my-20">
    <div class="flex justify-center">

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/3">
            <div class="flex-1">
                <div class="text-center">
                    <p class="mt-3 text-2xl font-semibold tracking-wider text-gray-700 capitalize">新パスワード入力フォーム</p>
                </div>

                <div class="mt-8">
                    <form method="POST" action="{{ route('user.password_reset.update') }}">
                        @csrf
                        <h1 class="text-gray-700 text-lg">新しいパスワードを設定</h1>
                        <input type="hidden" name="reset_token" value="{{ $userToken->token }}">

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-200">パスワード</label>
                            </div>
                            <input type="password" name="password" id="password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('password') is-invalid @enderror" autocomplete="current-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('token')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password_confirm" class="text-sm text-gray-600 dark:text-gray-200">パスワードを再入力</label>
                            </div>
                            <input type="password_confirm" name="password_confirm" id="password_confirm" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('password_confirm') is-invalid @enderror" autocomplete="current-password_confirm" />
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                パスワードを再設定
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
