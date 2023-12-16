@extends('layouts.app')

@section('content')

<div class="bg-white dark:bg-gray-900 my-20">
    <div class="flex justify-center">

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/3">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-700 capitalize text-center">
                    無料で教師アカウントを作成
                </h1>

                <form method="POST" action="{{ route('teacher.register') }}" class="grid grid-cols-1 gap-6 mt-8">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">名前</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">姓</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">名</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus />
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">姓カナ</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('last_name_kana') is-invalid @enderror" name="last_name_kana" value="{{ old('last_name_kana') }}" required autocomplete="last_name_kana" autofocus />
                        @error('last_name_kana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">名カナ</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('first_name_kana') is-invalid @enderror" name="first_name_kana" value="{{ old('first_name_kana') }}" required autocomplete="first_name_kana" autofocus />
                        @error('first_name_kana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <p class="block mb-2 text-sm text-gray-600 dark:text-gray-200">アイコン画像</p>
                        <label for="dropzone-file" class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                            <h2 class="mx-3 text-gray-400">画像を選択してください</h2>
                            <input id="dropzone-file" type="file" name="image" class="hidden" />
                        </label>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">プロフィール</label>
                        <textarea type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('profile') is-invalid @enderror" name="profile" value="{{ old('profile') }}" required autocomplete="profile" autofocus rows="5"></textarea>
                        @error('profile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

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

                    {{-- <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">ご自身のWebサイトURL（任意）</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp') }}" required autocomplete="hp" autofocus />
                        @error('hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">ご自身のXアカウントURL（任意）</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('x') is-invalid @enderror" name="x" value="{{ old('x') }}" required autocomplete="x" autofocus />
                        @error('x')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">ご自身のYouTubeアカウントURL（任意）</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('youtube') is-invalid @enderror" name="youtube" value="{{ old('youtube') }}" required autocomplete="youtube" autofocus />
                        @error('youtube')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

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
