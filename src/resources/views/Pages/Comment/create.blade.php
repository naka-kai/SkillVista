@extends('Layouts.app')

@section('content')
<!-- editor -->
<h1 class="mt-10 text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">質問を投稿</h1>
<hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
<div class="my-10">
    <form
        action="{{ route('movie', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en, 'courseName' => $courseName, 'movieId' => $qa->movie_id]) }}"
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
