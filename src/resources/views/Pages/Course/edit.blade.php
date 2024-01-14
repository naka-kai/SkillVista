@extends('Layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/rate.css') }}">
<style>
    .accordion_inner {
        display: none;
    }
    .accordion:first-of-type > .accordion_inner {
        display: block;
    }
    .is_open {
        display: none;
    }
    .is_open.open {
        display: block;
    }
    .is_close {
        display: block;
    }
    .is_open.open + .is_close {
        display: none;
    }
    .modal_container {
        display: none;
        background-color: rgba(204, 204, 204, 0.7);
    }
    .ui-sortable-handle {
        cursor: grab;
    }
    .ui-sortable-handle:active {
        cursor: grabbing;
    }
</style>
@endsection

@section('content')
<div class="my-5">
    {{-- フラッシュメッセージ・エラー表示 --}}
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
    
    <div class="wrapper mt-8">
        {{-- サムネイル画像 --}}
        <div>
            <div class="flex items-center mt-7">
                <h3 class="text-xl font-semibold text-gray-800">サムネイル画像</h3>
                <button
                    class="modalOpen inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                    type="button">編集</button>
            </div>
            <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
            <figure class="w-full flex justify-center">
                <img class="object-cover object-center w-full h-[26rem] rounded-lg"
                src="{{ $course->thumbnail == null || '' ? asset('img/noimage.png') : asset($course->thumbnail) }}"
                alt="">
            </figure>
            <div class="modal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
            <div
                class="bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                <div class="flex items-center justify-between mb-5">
                    <h1 class="font-bold text-lg">サムネイル画像を変更</h1>
                    <span class="modalClose cursor-pointer">×</span>
                </div>
                <div>
                    <form
                        action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $course->id }}">
                        <div>
                            <div class="flex flex-col items-center justify-center mb-4 mt-3">
                                <img
                                    src="{{ $course->thumbnail == null || '' ? asset('img/noimage.png') : asset($course->thumbnail) }}"
                                    alt="" class="displayImg object-cover object-center w-full h-auto rounded-lg">
                            </div>
                            <label for="thumbnail"
                                class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                                <h2 class="fileName mx-3 text-gray-400">画像を選択してください</h2>
                                <input id="thumbnail" type="file" name="thumbnail"
                                    class="preview hidden @error('thumbnail') is-invalid @enderror" accept=".jpg, .jpeg, .png, .gif"
                                    value="{{ old('thumbnail') }}" autocomplete="thumbnail" />
                            </label>
                        </div>
                        <button type="submit"
                            class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md w-full mt-5">変更</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    <div class="mt-8">
        {{-- コースのタイトル（検索時に使用） --}}
        <div class="mt-10">
            <form action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $course->id }}">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースのタイトル（検索時に使用されます）</h3>
                    <button
                        class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                        type="button">編集</button>
                    <button
                        class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                        type="submit">保存</button>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="title" class="editContent mt-2 resize-none outline-none w-full h-auto" readonly>{!! nl2br(e($course->title)) !!}</textarea>
            </form>
        </div>

        {{-- コースの軽い説明（検索時に使用） --}}
        <div class="mt-10">
            <form action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $course->id }}">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースの軽い説明（検索時に使用されます）</h3>
                    <button
                        class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                        type="button">編集</button>
                    <button
                        class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                        type="submit">保存</button>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="description" class="editContent mt-2 resize-none outline-none w-full h-auto" readonly>{!! nl2br(e($course->description)) !!}</textarea>
            </form>
        </div>

        {{-- コースの内容 --}}
        <div class="mt-10">            
            <h3 class="text-xl font-semibold text-gray-800">コースの内容</h3>

            <hr class="mt-3 border-gray-200 dark:border-gray-700">

            <div id="chapter_list">
                @foreach ($course->chapters as $chapter)
                <div id="{{ $chapter->id }}" class="accordion">
                    <input type="hidden" form="chapter_form" class="chapter_seq" value="{{ $chapter->id }}" name="seq[{{ $chapter->id }}]">
                    <div class="my-5">
                        <div class="accordion_header flex items-center focus:outline-none">
                            <span class="is_open text-gray-400 bg-gray-200 rounded-full block cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                </svg>
                            </span>
                            <span class="is_close text-white bg-blue-500 rounded-full cursor-pointer hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </span>
    
                            <div class="flex items-center w-full">
                                <h1 class="mx-4 text-xl">{{ $chapter->title }}</h1>
                            </div>
                        </div>
    
                        <div class="accordion_inner flex mt-8 md:mx-10">
                            <ul class="max-w-3xl px-2 text-gray-700">
                                @foreach ($chapter->movies as $movie)
                                <div id="movie_list">
                                    <li class="leading-8 flex items-center mb-1">
                                        <form action="{{ route('movie.destroy', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="action" value="delete_movie">
                                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                            <button type="submit" onclick="return confirm('この動画を削除しますか？')">
                                                <img src="{{ asset('img/remove-movie.png') }}" class="w-9 h-auto cursor-pointer">
                                            </button>
                                        </form>
                                        <p class="ml-1 text-lg">{{ $movie->movie_title }}</p>
                                    </li>
                                </div>
                                @endforeach
                                <div class="mb-1">
                                    <div>
                                        <div class="flex items-center">
                                            <div class="modalOpen cursor-pointer flex items-center">
                                                <img src="{{ asset('img/add-movie.png') }}" class="w-9 h-auto">
                                                <h2 class="fileName text-gray-400 ml-1">動画を選択してください</h2>
                                            </div>
                                        </div>
                                        <div class="modal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                                        <div
                                            class="bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                                            <div class="flex items-center justify-between mb-5">
                                                <h1 class="font-bold text-lg">動画を追加</h1>
                                                <span class="modalClose cursor-pointer">×</span>
                                            </div>
                                            <div>
                                                <form
                                                    action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $course->id }}">
                                                    <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                                                    <div>
                                                        <div class="flex flex-col items-center justify-center mb-4 mt-3">
                                                            <video
                                                                src="" class="displayImg object-cover object-center w-full h-auto rounded-lg" controls></video>
                                                        </div>
                                                        <label for="movie"
                                                            class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                                                            <h2 class="fileName mx-3 text-gray-400">動画を選択してください</h2>
                                                            <input id="movie" type="file" name="movie"
                                                                class="preview hidden @error('movie') is-invalid @enderror" accept="video/*"
                                                                value="{{ old('movie') }}" autocomplete="movie" />
                                                        </label>
                                                    </div>
                                                    <div class="mt-5 flex flex-col">
                                                        <label for="movie_title" class="mb-1">動画タイトル</label>
                                                        <input type="text" id="movie_title" name="movie_title" value="{{ old('movie_title') }}" class="border p-1">
                                                    </div>
                                                    <button type="submit"
                                                        class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md w-full mt-5">追加</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                                
    
                                @foreach ($chapter->tests as $test)
                                <li class="leading-8 flex items-center">
                                    <figure>
                                        <img src="{{ asset('img/remove-file.png') }}" class="w-10 h-auto cursor-pointer">
                                    </figure>
                                    <p class="text-lg">{{ $test->title }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr class="mt-3 border-gray-200 dark:border-gray-700">
                </div>
                @endforeach

            </div>
            <form action="{{ route('chapter.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" id="chapter_form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="chapter_result" id="chapter_result">
            </form>
            <form action="" id="movie_form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="movie_result" id="movie_result">
            </form>
        </div>

        {{-- コースの詳しい説明 --}}
        <div class="mt-10">
            <form action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $course->id }}">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースの詳しい説明</h3>
                    <button
                        class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                        type="button">編集</button>
                    <button
                        class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                        type="submit">保存</button>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="outline" class="editContent mt-2 resize-none outline-none w-full h-auto" readonly>{!! nl2br(e($course->outline)) !!}</textarea>
            </form>
        </div>

        {{-- 対象受講者 --}}
        <div class="mt-10">
            <form action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $course->id }}">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースの対象受講者</h3>
                    <button
                        class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                        type="button">編集</button>
                    <button
                        class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                        type="submit">保存</button>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="target" class="editContent mt-2 resize-none outline-none w-full h-auto" readonly>{!! nl2br(e($course->target)) !!}</textarea>
            </form>
        </div>

        {{-- 前提条件 --}}
        <div class="mt-10">
            <form action="{{ route('course.update', ['teacherName' => $course->teacher->last_name . $course->teacher->first_name, 'courseName' => $course->course_url]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $course->id }}">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">受講における前提条件</h3>
                    <button
                        class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                        type="button">編集</button>
                    <button
                        class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                        type="submit">保存</button>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="need" class="editContent mt-2 resize-none outline-none w-full h-auto" readonly>{!! nl2br(e($course->need)) !!}</textarea>
            </form>
        </div>

        <div class="w-full mt-10">
            <div class="flex items-center w-4/5 justify-between mx-auto">
                <a href="{{ route('course', ['courseName' => $course->course_url]) }}" class="bg-blue-300 hover:opacity-70 py-3 px-5 text-center my-5 font-bold w-full m-7 rounded-md">表示を見てみる</a>
                <a href="{{ route('teacher.myCourse', ['teacherName' => $course->teacher->last_name_en . $course->teacher->first_name_en]) }}" class="bg-blue-300 hover:opacity-70 py-3 px-5 text-center my-5 font-bold w-full rounded-md">マイコース一覧</a>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        /* 動画アコーディオン */
        // 最初の章は開いたままにしておく
        $('.accordion:first-of-type .accordion_inner').css('display', 'block');
        $('.accordion:first-of-type .accordion_header > .is_open').addClass('open');
        $('.accordion_header').click(function() {
            $(this).next('.accordion_inner').slideToggle();
            $(this).children('.is_open').toggleClass('open');
        })

        /* 評価モーダル */
        const rate_modal = $('#rate_modal')
        const modal_open = $('.modal_open');
        const modal_close = $('.modal_close');
        const modal_container = $('.modal_container');
        const modal_more = $('.modal_more');

        let rate_count = rate_modal.find('li').length;
        let display_num = 10; // 現在表示中の評価の数

        // もっと見るボタンでモーダルを表示
        modal_open.on('click', function() {
            modal_container.fadeIn();
            return false;
        });
        // 閉じるボタンでモーダルを非表示
        modal_close.on('click', function() {
            modal_container.fadeOut();
        })
        // モーダル外をクリックでモーダルを非表示
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.modal_body').length) {
                modal_container.fadeOut();
            }
        });

        // 評価が10件以上ならもっと見るボタンを表示
        if (rate_count > display_num) {
            modal_more.show();
        }

        rate_modal.find('li:gt(9)').hide(); // 9より大きいインデックスのliを隠す = 10件表示
        modal_more.on('click', function() {
            // 更に10件表示
            display_num += 10;
            rate_modal.find('li:lt(' + display_num + ')').slideDown();
            // 次に表示する評価の数が10件以内ならもっと見るボタンを消す
            if (rate_count <= display_num) {
                modal_more.hide();
            }
        });

        /* 編集モーダル開閉 */
        $('.modalOpen').on('click', function() {
            $(this).parent().nextAll('.modal').removeClass('hidden').addClass('flex justify-center items-center');
        })
        $('.modalClose').on('click', function() {
            $(this).closest('.wrapper').find('.modal').removeClass('flex justify-center items-center').addClass('hidden');
        })

        /* コースのサムネイル画像を選択時にプレビュー表示 */
        $('.preview').on('change', function(e) {
            $(this).prev('.fileName').text($(this).prop('files')[0].name);
            let displayImg = $(this).parent().prev().children('.displayImg');
            let reader = new FileReader();
            reader.onload = function(e) {
                displayImg.attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })

        /* その場編集 */
        // 編集・保存ボタンの切り替え
        $('.editBtn').on('click', function() {
            $(this).next('.submitBtn').removeClass('hidden').addClass('inline-flex');
            $(this).addClass('hidden').removeClass('inline-flex');
            // テキストエリア編集可能
            $(this).parent().nextAll('.editContent').attr('readonly', false).attr('rows', 5);
            $(this).parent().nextAll('.editContent').removeClass('resize-none outline-none').addClass('border p-1');
        })
        $('.submitBtn').on('click', function() {
            $(this).prev('.editBtn').removeClass('hidden').addClass('inline-flex');
            $(this).removeClass('inline-flex').addClass('hidden');
            // テキストエリア編集不可
            $(this).parent().nextAll('.editContent').attr('readonly', true).attr('rows', 1);
            $(this).parent().nextAll('.editContent').removeClass('border p-1').addClass('resize-none outline-none');
        })

        /* チャプターの順番を並べ替える */
        const $chapterForm = $('#chapter_form');
        const $chapterResult = $('#chapter_result');
        const $chapterList = $('#chapter_list');

        $chapterList.sortable({
            update: function() {
                console.log($chapterList.sortable('toArray'));
                let i = 1;
                $('.chapter_seq').each(function() {
                    let chapter_seq = $(this).val(i);
                    i++;
                });
                $.ajax({
                    url: 'chapter.update',
                    type: 'GET',
                }).done(function(json) {
                    console.log('ajax成功');
                }).fail(function(json) {
                    console.log('ajax失敗');
                });
            }
        })
    });
</script>
@endsection