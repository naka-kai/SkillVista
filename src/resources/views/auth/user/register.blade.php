@extends('layouts.app')

@section('content')

<div class="bg-white dark:bg-gray-900 my-20">
    <div class="flex justify-center">

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/3">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-700 capitalize text-center">
                    無料でユーザーアカウントを作成
                </h1>

                <form method="POST" action="{{ route('user.register') }}" class="grid grid-cols-1 gap-6 mt-8" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">ユーザー名 *（公開されます）</label>
                        <input type="text" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus />
                        @foreach ($errors->get('username') as $message)
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @endforeach
                    </div>

                    <div>
                        <p class="block mb-2 text-sm text-gray-600 dark:text-gray-200">アイコン画像 *</p>
                        <div class="flex items-end mb-4 mt-3">
                            <img id="displayImg" src="{{ asset('img/kkrn_icon_user_13.png') }}" alt="" class="w-24 h-24 rounded-full">
                            <button class="py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5" type="button" id="displayImgDelete">削除</button>
                        </div>
                        <label for="image" class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                            <h2 id="fileName" class="mx-3 text-gray-400">画像を選択してください</h2>
                            <input id="image" type="file" name="image" class="hidden @error('image') is-invalid @enderror" accept=".jpg, .jpeg, .png, .gif" value="{{ old('image') }}" autocomplete="image" />
                        </label>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">メールアドレス *</label>
                        <input type="email" placeholder="example@example.com" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" />
                        @foreach ($errors->get('email') as $message)
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @endforeach
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">パスワード *</label>
                        <input type="password" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('password') is-invalid @enderror" name="password" autocomplete="new-password" />
                        <div class="text-sm text-gray-600 mt-2 ml-3">
                            <p class="mb-1">パスワードは以下の基準を満たしてください</p>
                            <ul class="list-disc list-inside">
                                <li>アルファベット大文字を含む</li>
                                <li>アルファベット小文字を含む</li>
                                <li>数字を含む</li>
                                <li>8桁以上</li>
                            </ul>
                        </div>
                        @foreach ($errors->get('password') as $message)
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @endforeach
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">パスワード再入力 *</label>
                        <input type="password" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"  id="password-confirm" name="password_confirmation" autocomplete="new-password" />
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

@section('script')
<script>
    /* アイコン画像を選択時にプレビュー表示 */
    // プレビュー表示
    $('#image').on('change', function(e) {
        $('#fileName').text($('#image').prop('files')[0].name);
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#displayImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    })
    // プレビューを削除してデフォルトに戻す
    $('#displayImgDelete').on('click', function(e) {
        $('#displayImg').attr('src', "{{ asset('img/kkrn_icon_user_13.png') }}");
        $('#image').val('');
        $('#fileName').text('画像を選択してください');
    })
</script>
@endsection