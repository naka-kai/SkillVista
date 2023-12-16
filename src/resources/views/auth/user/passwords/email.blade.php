@extends('layouts.app')

@section('content')
<div class="bg-white my-20">
    <div class="flex justify-center">

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/3">
            <div class="flex-1">
                <div class="text-center">
                    <p class="mt-3 text-2xl font-semibold tracking-wider text-gray-700 capitalize">ユーザーパスワードリセット</p>
                </div>

                @if (session('status'))
                    <div class="text-blue-500" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-8">
                    <form method="POST" action="{{ route('user.password.email') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">メールアドレス</label>
                            <input type="email" name="email" id="email" placeholder="example@example.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                パスワードリセットリンクを送信する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
