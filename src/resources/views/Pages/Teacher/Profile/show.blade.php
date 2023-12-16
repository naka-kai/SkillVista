@extends('Layouts.app')

@section('content')

<div class="my-10">
    <figure class="w-full flex justify-center">
        <img class="object-cover w-36 h-36 rounded-full ring ring-gray-300 dark:ring-gray-600" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100" alt="">
    </figure>

    <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 flex flex-col items-center">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">アカウント情報</h2>

        <div class="flex flex-col">
            <div>
                <div class="flex items-center mt-7">
                    <p class="text-gray-700 dark:text-gray-200">氏名</p>
                </div>
                <p class="ml-3 mt-2">田中 太郎</p>
            </div>

            <div>
                <div class="flex items-center mt-6">
                    <p class="text-gray-700 dark:text-gray-200">メールアドレス</p>
                    <button class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                    type="button" id="emailModalOpen">編集</button>
                </div>
                <p class="ml-3 mt-2">example@example.com</p>
                <div id="emailModal" class="emailModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                    <div class="emailModal-content bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                        <div class="emailModal-header flex items-center justify-between mb-5">
                            <h1 class="font-bold text-lg">ユーザー名を変更</h1>
                            <span id="emailModalClose" class="cursor-pointer">×</span>
                        </div>
                        <div class="emailModal-body">
                            <form action="{{ route('teacher.profile.show', ['teacherName' => 'teacherName']) }}">
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

        <div class="flex justify-start mt-9">
            <button id="passwordModalOpen" class="px-8 py-2.5 leading-5 text-gray-700 transition-colors duration-300 transform bg-gray-100 border border-gray-500 rounded-md hover:opacity-70">パスワードを変更</button>
            <div id="passwordModal" class="passwordModal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                <div class="passwordModal-content bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                    <div class="passwordModal-header flex items-center justify-between mb-5">
                        <h1 class="font-bold text-lg">パスワードを変更</h1>
                        <span id="passwordModalClose" class="cursor-pointer">×</span>
                    </div>
                    <div class="passwordModal-body">
                        <form action="{{ route('teacher.profile.show', ['teacherName' => 'teacherName']) }}">
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
        <div class="mt-10 py-2 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 w-48">
            <a href="{{ route('teacher.logout') }}" class="block"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
            </a>

            <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    
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