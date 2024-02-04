@extends('Layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <div class="flex items-center focus:outline-none">
                    <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                        src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                        alt="">
    
                    <h1 class="mx-4 text-xl text-gray-700 dark:text-white font-bold">タイポかな？</h1>
                </div>
                <div class="flex items-center text-sm ml-12 mt-2">
                    <span>田中</span>
                    <span class="ml-2">2年前</span>
                </div>
            </div>
            <button
                class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 mr-4"
                type="button">編集</button>
        </div>

        <!-- comments -->
        @for ($i = 0; $i < 3; $i++)
            <div class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <div class="flex justify-between items-center mb-2">
                    <div class="">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                            <img class="mr-4 w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Bonnie Green">山田 太郎
                        </p>
                        <p class="text-sm ml-12">2年前</p>
                    </div>

                    <!-- 編集ボタン -->
                    <button
                        class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70"
                        type="button">編集</button>
                </div>
                <p class="text-gray-500 mt-4">すいません。ご指摘いただき本当にありがとうございます！</p>
            </div>
        @endfor

        <!-- editor -->
        <div class="my-10">
            <form
                action="{{ route('comment.show', ['answerId' => 'answerId', 'commentId' => 'commentId', 'courseName' => 'courseName']) }}"
                id="form">
                @csrf
                <textarea name="title" id="title" class="border border-[#ccc] w-full p-2" placeholder="タイトル" rows="1"></textarea>
                <textarea name="contents" id="contents" class="hidden"></textarea>
                <div id="quill_editor" class="pb-16"></div>
                <div class="flex justify-end mt-3">
                    <button type="button" onclick="clickSubmit();"
                        class="px-10 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-sm hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">送信</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/quillcustom.js') }}"></script>
    <script>
        // https://blog.4breaker.com/2020/04/20/post-864/
        var quill = quillEditor('quill_editor');

        const form = document.getElementById('form');
        const contents = document.getElementById('contents');

        function clickSubmit() {
            contents.value = quill.root.innerHTML;
            form.submit();
        }
    </script>
@endsection
