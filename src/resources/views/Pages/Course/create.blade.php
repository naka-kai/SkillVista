@extends('Layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/rate.css') }}">
    <style>
        .is_open {
            display: none;
        }

        .is_open.open {
            display: block;
        }

        .is_close {
            display: block;
        }

        .is_open.open+.is_close {
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

        <form action="{{ route('course.store', ['teacherName' => $teacherName]) }}" method="POST">
            @csrf
            {{-- サムネイル画像 --}}
            <div class="wrapper mt-8">
                <div>
                    <div class="flex items-center mt-7">
                        <h3 class="text-xl font-semibold text-gray-800">サムネイル画像</h3>
                    </div>
                    <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                    <div>
                        <div class="flex flex-col items-center justify-center mb-4 mt-3">
                            <img src="{{ old('thumbnail') == null || '' ? asset('img/noimage.png') : asset(old('thumbnail')) }}"
                                alt="" class="displayImg object-cover object-center w-full h-auto rounded-lg">
                        </div>
                        <label for="thumbnail"
                            class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                            <h2 class="fileName mx-3 text-gray-400">画像を選択してください</h2>
                            <input id="thumbnail" type="file" name="thumbnail"
                                class="preview hidden @error('thumbnail') is-invalid @enderror"
                                accept=".jpg, .jpeg, .png, .gif" value="{{ old('thumbnail') }}" autocomplete="thumbnail" />
                        </label>
                    </div>
                </div>
            </div>

            {{-- コースのタイトル（検索時に使用） --}}
            <div class="mt-10">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースのタイトル（検索時に使用されます）</h3>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="title" class="editContent mt-2 border w-full h-auto">{!! nl2br(e(old('title'))) !!}</textarea>
            </div>

            {{-- コースのURL --}}
            <div class="mt-10">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースのスラッグ（URLの一部分）</h3>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <input name="course_url" class="editContent mt-2 border w-full h-auto" value="{{ old('course_url') }}" />
            </div>

            {{-- コースの軽い説明（検索時に使用） --}}
            <div class="mt-10">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースの軽い説明（検索時に使用されます）</h3>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="description" class="editContent mt-2 border w-full h-auto" rows="5">{!! nl2br(e(old('description'))) !!}</textarea>
            </div>

            {{-- コースの内容 --}}
            <div class="mt-10">
                <h3 class="text-xl font-semibold text-gray-800">コースの内容</h3>

                <hr class="mt-3 border-gray-200 dark:border-gray-700">

                <div id="course_contents">
                    <div id="chapter_list"></div>
                    <div id="new_chapter" class="flex items-center my-5 w-full">
                        <input type="text" id="new_chapter_input" value="" class="border w-full py-2">
                        <button type="button" id="new_chapter_btn" class="ml-3">
                            <img src="{{ asset('img/add-chapter.png') }}" class="w-10">
                        </button>
                    </div>
                </div>
            </div>

            {{-- コースの詳しい説明 --}}
            <div class="mt-10">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースの詳しい説明（概要）</h3>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="outline" class="editContent mt-2 border w-full h-auto" rows="8">{!! nl2br(e(old('outline'))) !!}</textarea>
            </div>

            {{-- 対象受講者 --}}
            <div class="mt-10">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">コースの対象受講者</h3>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="target" class="editContent mt-2 border w-full h-auto" rows="3">{!! nl2br(e(old('target'))) !!}</textarea>
            </div>

            {{-- 前提条件 --}}
            <div class="mt-10">
                <div class="flex items-center mt-7">
                    <h3 class="text-xl font-semibold text-gray-800">受講における前提条件</h3>
                </div>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <textarea name="need" class="editContent mt-2 border w-full h-auto" rows="3">{!! nl2br(e(old('need'))) !!}</textarea>
            </div>

            {{-- ボタン --}}
            <div class="flex items-center mt-8">
                <div class="w-full">
                    <div class="flex items-center w-4/5 justify-between mx-auto">
                        <button
                            class="bg-white border border-gray-400 hover:opacity-70 py-3 px-5 text-center my-3 font-bold w-full rounded-md"
                            type="submit" name="draft">下書き保存</button>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex items-center w-4/5 justify-between mx-auto">
                        <button class="bg-blue-300 hover:opacity-70 py-3 px-5 text-center my-3 font-bold w-full rounded-md"
                            type="submit" name="publish">公開</button>
                    </div>
                </div>
            </div>
            <div class="w-full mt-2">
                <div class="flex items-center w-4/5 justify-between mx-auto">
                    <a href="{{ route('teacher.myCourse', ['teacherName' => $teacherName]) }}"
                        class="hover:opacity-70 text-center my-3 w-full underline text-blue-500">マイコース一覧</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(function() {

            /* チャプター追加イベント実行 */
            $('#new_chapter_btn').on('click', async function() {

                // 入力フィールドからデータを取得
                const newChapterTitle = await getNewChapterTitle()

                // チャプターの追加
                const chapter = await addChapter(newChapterTitle)

                // チャプターアコーディオン開閉
                const chapterAccordion = await toggleChapterAccordion(chapter.id)

                // 入力フィールドをクリア
                const clearChapterTitle = await clearNewChapterTitle()
            });

            /* チャプター追加 */
            async function addChapter(title) {

                // id（チャプター数）の取得
                const chapterCount = await getChapterCount()

                // チャプター要素の作成
                const chapterHtml = await createChapterHtml(chapterCount, title)

                // チャプター要素の追加
                await addChapterElement(chapterHtml)

                // 動画モーダル開閉
                movieModal()

                // 動画を選択時にプレビュー表示
                previewMovie()

                return {
                    id: chapterCount
                }
            }

            /* id（チャプター数）の取得 */
            async function getChapterCount() {
                return new Promise((resolve, reject) => {
                    const chapterLength = $('.chapter').length

                    resolve(chapterLength + 1)
                })
            }

            /* 入力フィールドからデータを取得 */
            async function getNewChapterTitle() {
                return $('#new_chapter_input').val()
            }

            /* チャプターHTMLの作成 */
            async function createChapterHtml(id, title) {
                return `<div id="chapter_${id}" class="accordion chapter">
                        <div class="my-5">
                            <div class="accordion_header flex items-center focus:outline-none">
                                <span class="is_open text-gray-400 bg-gray-200 rounded-full block cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 12H6" />
                                    </svg>
                                </span>
                                <span class="is_close text-white bg-blue-500 rounded-full cursor-pointer hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </span>

                                <div class="flex items-center w-full">
                                    <h1 class="ml-4 text-xl w-full">
                                        <input type="text" id="chapter_title${id}" name="chapter_title${id}" value="${title}" class="border py-2 w-full">
                                    </h1>
                                </div>
                            </div>
                            <div class="accordion_inner wrapper flex mt-8 md:mx-10">
                                <ul id="chapter${id}_movie_list" class="movie_list text-gray-700"></ul>
                                <ul id="chapter${id}_add_movie" class="moviefile max-w-3xl text-gray-700">
                                    <li>
                                        <div class="mb-1">
                                            <div class="flex items-center">
                                                <div class="modalOpen cursor-pointer flex items-center">
                                                    <img src="{{ asset('img/add-movie.png') }}" class="w-9 h-auto">
                                                    <h2 class="text-gray-400 ml-1">動画を選択してください
                                                    </h2>
                                                </div>
                                            </div>
                                            <div
                                                class="modal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                                                <div
                                                    class="bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                                                    <div class="flex items-center justify-between mb-5">
                                                        <h1 class="font-bold text-lg">動画を追加</h1>
                                                        <span class="modalClose cursor-pointer">×</span>
                                                    </div>
                                                    <div>
                                                        <input type="hidden" name="chapter_id" value="${id}">
                                                        <div>
                                                            <div
                                                                class="flex flex-col items-center justify-center mb-4 mt-3">
                                                                <video src=""
                                                                    class="displayImg object-cover object-center w-full h-auto rounded-lg"
                                                                    controls></video>
                                                            </div>
                                                            <label for="chapter${id}_movie"
                                                                class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                                                                <h2 class="fileName mx-3 text-gray-400">
                                                                    動画を選択してください</h2>
                                                                <input id="chapter${id}_movie" type="file" name="chapter${id}_movie" value="" class="preview hidden @error('movie') is-invalid @enderror"
                                                                    accept="video/*" value=""
                                                                    autocomplete="movie" />
                                                            </label>
                                                        </div>
                                                        <div class="mt-5 flex flex-col">
                                                            <label class="mb-1">動画タイトル</label>
                                                            <input type="text" id="chapter${id}_movie_title" value="" class="movie_title border p-1">
                                                        </div>
                                                        <button type="button" class="chapter${id}_movie_add_btn movie_add_btn bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md w-full mt-5">追加</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="max-w-3xl text-gray-700">
                                    <li class="leading-8 flex items-center">
                                        <figure>
                                            <img src="{{ asset('img/remove-file.png') }}"
                                                class="w-10 h-auto cursor-pointer">
                                        </figure>
                                        <p class="text-lg">test</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="mt-3 border-gray-200 dark:border-gray-700">
                    </div>`
            }

            /* チャプター要素の追加 */
            async function addChapterElement(html) {
                $('#chapter_list').append(html)
            }

            /* 入力フィールドをクリア */
            async function clearNewChapterTitle() {
                $('#new_chapter_input').val('')
            }

            /* チャプターアコーディオン開閉 */
            // 最初は開いたままにしておく
            async function toggleChapterAccordion(chapterCount) {
                $('.accordion .accordion_inner').css('display', 'block')
                $('.accordion .accordion_header > .is_open').addClass('open')
                $('#chapter_list').on('click', `#chapter_${chapterCount} .accordion_header`, function() {
                    $(this).next('.accordion_inner').slideToggle()
                    $(this).children('.is_open').toggleClass('open')
                })
            }

            /* 動画モーダル */
            async function movieModal() {

                // 以前のクリックイベントを削除
                $('#chapter_list').off('click', '.movie_add_btn');

                // モーダルが開いた時
                $('#chapter_list').on('click', '.modalOpen', async function() {

                    // モーダルオープン
                    $(this).parent().nextAll('.modal').removeClass('hidden').addClass(
                        'flex justify-center items-center');

                    // 動画を追加するチャプターのIDを取得
                    const modalChapterId = await $(this).closest('.chapter').attr('id')

                    /* 動画追加イベント実行 */

                    // 以前のクリックイベントを削除
                    $(`#${modalChapterId}`).off('click', '.movie_add_btn');

                    $(`#${modalChapterId}`).on('click', '.movie_add_btn', async function() {
                        // console.log('ok');

                        // 動画追加
                        const movie = await addMovie(modalChapterId)
                    })

                    // もし以前に入力されている情報があれば動画情報をリセットする
                    $(this).parent().next('.modal').find('.fileName').text('動画を選択してください');
                    $(this).parent().next('.modal').find('.displayImg').attr('src', '');
                    $(this).parent().next('.modal').find('.preview').val('');
                })

                // モーダルを閉じる時
                $('.modalClose').on('click', async function() {
                    return $(this).closest('.wrapper').find('.modal').removeClass(
                            'flex justify-center items-center')
                        .addClass('hidden');
                })
            }

            /* 動画を選択時にプレビュー表示 */
            function previewMovie() {
                $(document).on('change', '.preview', function(e) {
                    $(this).prev('.fileName').text($(this).prop('files')[0].name);
                    let displayImg = $(this).parent().prev().children('.displayImg');
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        displayImg.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                })
            }

            /* 動画追加 */
            async function addMovie(modalChapterId) {

                // id（動画数）の取得
                const movieCount = await getMovieCount(modalChapterId)
                // console.log(movieCount);

                // 動画タイトルの入力フィールドからデータを取得
                const newMovieTitle = await getNewMovieTitle(modalChapterId)

                // 動画要素の作成
                const movieHtml = await createMovieHtml(movieCount, newMovieTitle)

                // 動画要素の追加
                await addMovieElement(modalChapterId, movieHtml)

                // モーダルを閉じる
                await closeMovieModal(modalChapterId)

                // 入力フォームをリセットする
                await clearNewMovieTitle(modalChapterId)
            }

            /* id（動画数）の取得 */
            async function getMovieCount(modalChapterId) {
                // console.log('ok');
                return $(`#${modalChapterId} .movie`).length + 1
            }

            /* 動画タイトルの入力フィールドからデータを取得 */
            async function getNewMovieTitle(modalChapterId) {
                return $(`#${modalChapterId}`).find('.modal .movie_title').val()
            }

            /* 新しい動画要素を生成 */
            async function createMovieHtml(id, title) {
                return `<div class="movie_${id} movie">
                    <li class="leading-8 flex items-center mb-1">
                        <img src="{{ asset('img/remove-movie.png') }}"
                            class="remove_movie_btn w-9 h-auto cursor-pointer">
                        <input type="text" class="movie_title${id}" value="${title}" class="border py-1 ml-1 text-lg w-full">
                    </li>
                </div>`
            }

            /* 動画の要素を追加 */
            async function addMovieElement(modalChapterId, html) {
                const id = await cutChapterId(modalChapterId)
                return $(`#chapter${id}_movie_list`).append(html)
            }

            /* 「chapter_1」などと受け取った値を「1」などと返す */
            async function cutChapterId(modalChapterId) {
                return modalChapterId.replace('chapter_', '')
            }

            /* モーダルを閉じる */
            async function closeMovieModal(modalChapterId) {
                return $(`#${modalChapterId}`).find('.modal').removeClass(
                        'flex justify-center items-center')
                    .addClass('hidden')
            }

            /* 入力フォームをリセットする */
            async function clearNewMovieTitle(modalChapterId) {
                return $(`#${modalChapterId}`).find('.modal .movie_title').val('')
            }

            /* 動画を削除 */
            $('#chapter_list').on('click', '.remove_movie_btn', function() {
                if (!confirm('この動画を削除しますか？')) {
                    // キャンセルの場合
                    return false;
                } else {
                    $(this).closest('.movie').remove()
                }
            })

            // foreach (aaa as key a) {
            //      id=chapter_$key
            // }
            // このとき、どれだけaaaに入るのは動画のリスト
            // 動画のリストはどう取得する？

            /* チャプターの順番を並べ替える */
            const $chapterList = $('#chapter_list')
            // console.log($chapterList)

            $chapterList.sortable({
                update: function() {
                    let chapterSortedList = $chapterList.sortable('toArray')
                    let chapterSorted = []
                    chapterSortedList.forEach((e) => {
                        chapterSorted.push(e.replace('chapter_', ''))
                    })
                    console.log(chapterSorted)
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: "{{ route('course.create', ['teacherName' => $teacherName]) }}",
                        type: "GET",
                        data: {
                            chapterSorted: chapterSorted
                        },
                    }).done(function(data) {
                        console.log(data.chapterSorted);
                    }).fail(function(jqXHR, textStatus, error) {
                        console.log("更新に失敗しました")
                        console.log(jqXHR)
                        console.log(textStatus)
                        console.log(error)
                    })
                }
            })


            // /* 動画の順番を並べ替える */
            // let $countMovieList = $('[id^="movie_list"]').length

            // for (let i = 1; i <= $countMovieList; i++) {
            //     if ($('#movie_list' + i)) {
            //         const movieListId = '#movie_list' + i
            //         const $movieList = $(movieListId)
            //         $movieList.sortable({
            //             update: function() {
            //                 const chapterId = $(this).parent().parent().parent().attr('id').replace(
            //                     'chapter_', '')
            //                 let movieSortedList = $movieList.sortable('toArray')
            //                 let movieSorted = []
            //                 movieSortedList.forEach((e) => {
            //                     movieSorted.push(e.replace('movie_', ''))
            //                 })
            //                 // console.log(movieSorted)
            //                 $.ajaxSetup({
            //                     headers: {
            //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                     }
            //                 })
            //                 $.ajax({
            //                     url: "{{ route('movie.store', ['teacherName' => $teacherName, 'courseName' => 'courseName']) }}",
            //                     type: "POST",
            //                     data: {
            //                         movieSorted: movieSorted,
            //                         chapterId: chapterId
            //                     },
            //                 }).done(function(data) {}).fail(function(jqXHR, textStatus, error) {
            //                     console.log("更新に失敗しました")
            //                     console.log(jqXHR)
            //                     console.log(textStatus)
            //                     console.log(error)
            //                 })
            //             }
            //         })
            //     }
            // }

            /* コースのサムネイル画像を選択時にプレビュー表示 */
            $('.preview').on('change', function(e) {
                $(this).prev('.fileName').text($(this).prop('files')[0].name);
                let displayImg = $(this).parent().prev().children('.displayImg');
                let reader = new FileReader();
                reader.onload = function(e) {
                    displayImg.attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
