@extends('Layouts.app')

@section('content')

<div class="my-10">
    <div class="text-left mx-auto flex flex-col text-red-400">
        @if (session('flash_message'))
            <div class="my-3">
                {{ session('flash_message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="my-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="my-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="flex flex-col items-center justify-center">
        <figure class="w-full flex justify-center">
            <img class="object-cover w-36 h-36 rounded-full" src="{{ $user->image == null || "" ? asset('img/kkrn_icon_user_13.png') : asset($user->image) }}" alt="">
        </figure>
        <button class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 mt-2 mb-5" type="button" id="imageModalOpen">編集</button>
        <div id="imageModal" class="imageModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
            <div class="imageModal-content bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                <div class="imageModal-header flex items-center justify-between mb-5">
                    <h1 class="font-bold text-lg">アイコン画像を変更</h1>
                    <span id="imageModalClose" class="cursor-pointer">×</span>
                </div>
                <div class="imageModal-body">
                    <form action="{{ route('user.profile.update', ['userName' => $user->user_name]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div>
                            <div class="flex items-end mb-4 mt-3">
                                <img id="displayImg" src="{{ $user->image == null || "" ? asset('img/kkrn_icon_user_13.png') : asset($user->image) }}" alt="" class="w-24 h-24 rounded-full">
                                <button class="py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5" type="button" id="displayImgDelete">削除</button>
                            </div>
                            <label for="image" class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                                <h2 id="fileName" class="mx-3 text-gray-400">画像を選択してください</h2>
                                <input id="image" type="file" name="image" class="hidden @error('image') is-invalid @enderror" accept=".jpg, .jpeg, .png, .gif" value="{{ old('image') }}" autocomplete="image" />
                            </label>
                        </div>
                        <button type="submit" class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md w-full mt-5">変更</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 flex flex-col items-center">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white" id="imageModalOpen">アカウント情報</h2>

        <div class="flex flex-col">
            <div>
                <div class="flex items-center mt-7">
                    <p class="text-gray-700 dark:text-gray-200">ユーザー名</p>
                    <button class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                    type="button" id="usernameModalOpen">編集</button>
                </div>
                <p class="ml-3 mt-2">{{ $user->user_name }}</p>
                <div id="usernameModal" class="usernameModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                    <div class="usernameModal-content bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                        <div class="usernameModal-header flex items-center justify-between mb-5">
                            <h1 class="font-bold text-lg">ユーザー名を変更</h1>
                            <span id="usernameModalClose" class="cursor-pointer">×</span>
                        </div>
                        <div class="usernameModal-body">
                            <form action="{{ route('user.profile.update', ['userName' => $user->user_name]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="flex flex-col">
                                    <label for="username" class="mb-2">新しいユーザー名</label>
                                    <input type="text" name="username" id="username" class="mb-4 border border-gray-700 rounded-sm p-1">
                                    <button type="submit" class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">変更</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center mt-6">
                    <p class="text-gray-700 dark:text-gray-200">メールアドレス</p>
                    <button class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                    type="button" id="emailModalOpen">編集</button>
                </div>
                <p class="ml-3 mt-2">{{ $user->email }}</p>
                <div id="emailModal" class="emailModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                    <div class="emailModal-content bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                        <div class="emailModal-header flex items-center justify-between mb-5">
                            <h1 class="font-bold text-lg">メールアドレスを変更</h1>
                            <span id="emailModalClose" class="cursor-pointer">×</span>
                        </div>
                        <div class="emailModal-body">
                            <form action="{{ route('user.email.sendChangeEmailLink') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="flex flex-col">
                                    <label for="email" class="mb-2">新しいメールアドレス</label>
                                    <input type="email" name="email" id="email" class="mb-4 border border-gray-700 rounded-sm p-1">
                                    <button type="submit" class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">確認メールを送信</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <div class="flex justify-start mt-9">
            <button id="passwordModalOpen" class="px-8 py-2.5 leading-5 text-gray-700 transition-colors duration-300 transform bg-gray-100 border border-gray-500 rounded-md hover:opacity-70">パスワードを変更</button>
            <div id="passwordModal" class="passwordModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                <div class="passwordModal-content bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                    <div class="passwordModal-header flex items-center justify-between mb-5">
                        <h1 class="font-bold text-lg">パスワードを変更</h1>
                        <span id="passwordModalClose" class="cursor-pointer">×</span>
                    </div>
                    <div class="passwordModal-body">
                        <form action="{{ route('user.profile.update', ['userName' => $user->user_name]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <label for="oldPassword" class="mb-2">現在のパスワード</label>
                                    <input type="password" name="oldPassword" id="oldPassword" class="mb-4 border border-gray-700 rounded-sm p-1 w-full">
                                </div>
                                <div class="w-full">
                                    <label for="newPassword" class="mb-2">新しいパスワード</label>
                                    <input type="password" name="newPassword" id="newPassword" class="mb-4 border border-gray-700 rounded-sm p-1 w-full">
                                </div>
                                <div class="w-full">
                                    <label for="newPassword_confirmation" class="mb-2">新しいパスワード再入力</label>
                                    <input type="password" name="newPassword_confirmation" id="newPassword_confirmation" class="mb-6 border border-gray-700 rounded-sm p-1 w-full">
                                </div>
                                <button type="submit" class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">パスワードを変更</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 py-2 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 w-48">
            <a href="{{ route('user.logout') }}" class="block"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
            </a>

            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // アイコン画像モーダル
    const imageButtonOpen = document.getElementById('imageModalOpen');
    const imageModal = document.getElementById('imageModal');
    const imageButtonClose = document.getElementById('imageModalClose');

    imageButtonOpen.addEventListener('click', imageModalOpen);
    function imageModalOpen() {
        imageModal.classList.remove('hidden');
        imageModal.classList.add('flex');
        imageModal.classList.add('justify-center');
        imageModal.classList.add('items-center');
    }

    imageButtonClose.addEventListener('click', imageModalClose);
    function imageModalClose() {
        imageModal.classList.remove('flex');
        imageModal.classList.remove('justify-center');
        imageModal.classList.remove('items-center');
        imageModal.classList.add('hidden');
    }

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

    // ユーザー名モーダル
    const usernameButtonOpen = document.getElementById('usernameModalOpen');
    const usernameModal = document.getElementById('usernameModal');
    const usernameButtonClose = document.getElementById('usernameModalClose');

    usernameButtonOpen.addEventListener('click', usernameModalOpen);
    function usernameModalOpen() {
        usernameModal.classList.remove('hidden');
        usernameModal.classList.add('flex');
        usernameModal.classList.add('justify-center');
        usernameModal.classList.add('items-center');
    }

    usernameButtonClose.addEventListener('click', usernameModalClose);
    function usernameModalClose() {
        usernameModal.classList.remove('flex');
        usernameModal.classList.remove('justify-center');
        usernameModal.classList.remove('items-center');
        usernameModal.classList.add('hidden');
    }

    // メールアドレスモーダル
    const emailButtonOpen = document.getElementById('emailModalOpen');
    const emailModal = document.getElementById('emailModal');
    const emailButtonClose = document.getElementById('emailModalClose');

    emailButtonOpen.addEventListener('click', emailModalOpen);
    function emailModalOpen() {
        emailModal.classList.remove('hidden');
        emailModal.classList.add('flex');
        emailModal.classList.add('justify-center');
        emailModal.classList.add('items-center');
    }

    emailButtonClose.addEventListener('click', emailModalClose);
    function emailModalClose() {
        emailModal.classList.remove('flex');
        emailModal.classList.remove('justify-center');
        emailModal.classList.remove('items-center');
        emailModal.classList.add('hidden');
    }

    // パスワードモーダル
    const passwordButtonOpen = document.getElementById('passwordModalOpen');
    const passwordModal = document.getElementById('passwordModal');
    const passwordButtonClose = document.getElementById('passwordModalClose');

    passwordButtonOpen.addEventListener('click', passwordModalOpen);
    function passwordModalOpen() {
        passwordModal.classList.remove('hidden');
        passwordModal.classList.add('flex');
        passwordModal.classList.add('justify-center');
        passwordModal.classList.add('items-center');
    }

    passwordButtonClose.addEventListener('click', passwordModalClose);
    function passwordModalClose() {
        passwordModal.classList.remove('flex');
        passwordModal.classList.remove('justify-center');
        passwordModal.classList.remove('items-center');
        passwordModal.classList.add('hidden');
    }

</script>
@endsection