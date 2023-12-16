@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-900 my-20">
    <div class="flex justify-center">

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/3">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-700 capitalize text-center">
                    無料で教師アカウントを作成
                </h1>

                <form method="POST" action="{{ route('user.register') }}" class="grid grid-cols-1 gap-6 mt-8">
                    @csrf
                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">ユーザー名(公開されます)</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus />
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <p class="block mb-2 text-sm text-gray-600 dark:text-gray-200">アイコン画像</p>
                        <label for="dropzone-file" class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                            <h2 class="mx-3 text-gray-400">画像を選択してください</h2>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">姓</label>
                        <input type="text" placeholder="田中" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">名</label>
                        <input type="text" placeholder="太郎" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">メールアドレス</label>
                        <input type="email" placeholder="example@example.com" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">パスワード</label>
                        <input type="password" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                        <div class="text-sm text-gray-600 mt-2 ml-3">
                            <p class="mb-1">パスワードは以下の基準を満たしてください</p>
                            <ul class="list-disc list-inside">
                                <li>アルファベット大文字を含む</li>
                                <li>アルファベット小文字を含む</li>
                                <li>数字を含む</li>
                                <li>8桁以上</li>
                            </ul>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">パスワード再入力</label>
                        <input type="password" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"  id="password-confirm" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <button
                        class="flex items-center justify-center w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50 my-5">
                        <span>アカウントを作成</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
