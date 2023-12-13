@extends('Layouts.app')

@section('content')

<div class="my-10">
    <figure class="w-full flex justify-center">
        <img class="object-cover w-36 h-36 rounded-full ring ring-gray-300 dark:ring-gray-600" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100" alt="">
    </figure>

    <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">アカウント情報</h2>

        <div class="grid grid-cols-1 gap-6 mt-4">
            <div>
                <div class="flex items-center">
                    <p class="text-gray-700 dark:text-gray-200">ユーザー名</p>
                    <button class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                    type="button" id="usernameModalOpen">編集</button>
                </div>
                <p class="ml-3 mt-2">Kai</p>
                <div id="usernameModal" class="usernameModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                    <div class="usernameModal-content bg-white mx-auto my-[50%] w-1/2 duration-300 transform ease-in-out p-6 rounded-sm">
                        <div class="usernameModal-header flex items-center justify-between mb-5">
                            <h1 class="font-bold text-lg">ユーザー名を変更</h1>
                            <span id="usernameModalClose" class="cursor-pointer">×</span>
                        </div>
                        <div class="usernameModal-body">
                            <form action="{{ route('user.profile.show', ['userName' => 'userName']) }}">
                                @csrf
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
                <div class="flex items-center">
                    <p class="text-gray-700 dark:text-gray-200">メールアドレス</p>
                    <button class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                    type="button" id="emailModalOpen">編集</button>
                </div>
                <p class="ml-3 mt-2">example@example.com</p>
                <div id="emailModal" class="emailModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                    <div class="emailModal-content bg-white mx-auto my-[50%] w-1/2 duration-300 transform ease-in-out p-6 rounded-sm">
                        <div class="emailModal-header flex items-center justify-between mb-5">
                            <h1 class="font-bold text-lg">ユーザー名を変更</h1>
                            <span id="emailModalClose" class="cursor-pointer">×</span>
                        </div>
                        <div class="emailModal-body">
                            <form action="{{ route('user.profile.show', ['userName' => 'userName']) }}">
                                @csrf
                                <div class="flex flex-col">
                                    <label for="email" class="mb-2">新しいメールアドレス</label>
                                    <input type="text" name="email" id="email" class="mb-4 border border-gray-700 rounded-sm p-1">
                                    <button type="submit" class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">確認メールを送信</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <div class="flex justify-start mt-2">
            <button id="passwordModalOpen" class="px-8 py-2.5 leading-5 text-gray-700 transition-colors duration-300 transform bg-gray-100 border border-gray-500 rounded-md hover:opacity-70">パスワードを変更</button>
            <div id="passwordModal" class="passwordModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                <div class="passwordModal-content bg-white mx-auto my-[50%] w-1/2 duration-300 transform ease-in-out p-6 rounded-sm">
                    <div class="passwordModal-header flex items-center justify-between mb-5">
                        <h1 class="font-bold text-lg">パスワードを変更</h1>
                        <span id="passwordModalClose" class="cursor-pointer">×</span>
                    </div>
                    <div class="passwordModal-body">
                        <form action="{{ route('user.profile.show', ['userName' => 'userName']) }}">
                            @csrf
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <label for="oldPassword" class="mb-2">現在のパスワード</label>
                                    <input type="text" name="oldPassword" id="oldPassword" class="mb-4 border border-gray-700 rounded-sm p-1 w-full">
                                </div>
                                <div class="w-full">
                                    <label for="newPassword" class="mb-2">新しいパスワード</label>
                                    <input type="password" name="newPassword" id="newPassword" class="mb-4 border border-gray-700 rounded-sm p-1 w-full">
                                </div>
                                <div class="w-full">
                                    <label for="newPasswordConfirm" class="mb-2">新しいパスワード再入力</label>
                                    <input type="password" name="newPasswordConfirm" id="newPasswordConfirm" class="mb-6 border border-gray-700 rounded-sm p-1 w-full">
                                </div>
                                <button type="submit" class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">確認メールを送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // ユーザー名モーダル
    const usernameButtonOpen = document.getElementById('usernameModalOpen');
    const usernameModal = document.getElementById('usernameModal');
    const usernameButtonClose = document.getElementById('usernameModalClose');

    usernameButtonOpen.addEventListener('click', usernameModalOpen);
    function usernameModalOpen() {
        usernameModal.classList.remove('hidden');
        usernameModal.classList.add('block');
    }

    usernameButtonClose.addEventListener('click', usernameModalClose);
    function usernameModalClose() {
        usernameModal.classList.remove('block');
        usernameModal.classList.add('hidden');
    }

    // メールアドレスモーダル
    const emailButtonOpen = document.getElementById('emailModalOpen');
    const emailModal = document.getElementById('emailModal');
    const emailButtonClose = document.getElementById('emailModalClose');

    emailButtonOpen.addEventListener('click', emailModalOpen);
    function emailModalOpen() {
        emailModal.classList.remove('hidden');
        emailModal.classList.add('block');
    }

    emailButtonClose.addEventListener('click', emailModalClose);
    function emailModalClose() {
        emailModal.classList.remove('block');
        emailModal.classList.add('hidden');
    }

    // パスワードモーダル
    const passwordButtonOpen = document.getElementById('passwordModalOpen');
    const passwordModal = document.getElementById('passwordModal');
    const passwordButtonClose = document.getElementById('passwordModalClose');

    passwordButtonOpen.addEventListener('click', passwordModalOpen);
    function passwordModalOpen() {
        passwordModal.classList.remove('hidden');
        passwordModal.classList.add('block');
    }

    passwordButtonClose.addEventListener('click', passwordModalClose);
    function passwordModalClose() {
        passwordModal.classList.remove('block');
        passwordModal.classList.add('hidden');
    }

</script>
@endsection