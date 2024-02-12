@extends('Layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
        @foreach ($qas as $qa)
            @if ($qa->parent_id === 0)
            <div class="mb-6 flex justify-between items-start">
                <div>
                    <div class="flex items-center focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                            src="{{ $qa->image == null || '' ? asset('img/kkrn_icon_user_13.png') : asset($qa->image) }}">
                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white font-bold">{{ $qa->title }}</h1>
                    </div>
                    <div class="flex items-center text-sm ml-12 mt-2">
                        <span>{{ $qa->updated_by }}</span>
                        <span class="ml-2">{{ \Util::getDateDiff($qa->updated_at) }}</span>
                    </div>
                    <div class="text-gray-500 mt-4">
                        <p>{{ $qa->comment }}</p>
                    </div>
                </div>
                <button
                    class="flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 mr-6 whitespace-nowrap"
                    type="button">編集</button>
            </div>
            @else
            <!-- comments -->
            <div class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <div class="flex justify-between items-start mb-2">
                    <div class="">
                        <div class="flex items-center text-sm">
                            <img class="w-8 h-8 rounded-full"
                                src="{{ $qa->image == null || '' ? asset('img/kkrn_icon_user_13.png') : asset($qa->image) }}">
                            <div class="flex items-center text-sm ml-4 mt-2">
                                <span>{{ $qa->updated_by }}</span>
                                <span class="ml-2">{{ \Util::getDateDiff($qa->updated_at) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- 編集ボタン -->
                    <button
                        class="inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 whitespace-nowrap"
                        type="button">編集</button>
                </div>
                <p class="text-gray-500 mt-4">{{ $qa->comment }}</p>
            </div>
            @endif
        @endforeach

        <!-- editor -->
        <div class="my-10">
            <form
                action="{{ route('comment.show', ['commentId' => $commentId, 'courseName' => $courseName]) }}"
                id="form">
                @csrf
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
