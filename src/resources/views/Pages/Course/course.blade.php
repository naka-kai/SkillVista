@extends('Layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/rate.css') }}">
    <style>
        .accordion_inner {
            display: none;
        }

        .accordion:first-of-type>.accordion_inner {
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

        .is_open.open+.is_close {
            display: none;
        }

        .modal_container {
            display: none;
            background-color: rgba(204, 204, 204, 0.7);
        }
    </style>
@endsection

@section('content')
    <div class="my-5">
        <img class="object-cover object-center w-full h-96 rounded-lg"
            src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
            alt="">

        <div class="mt-8">
            <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                {{ $course->title }}
            </h1>

            <p class="mt-2">{{ $course->description }}</p>

            <a href="{{ route('teacher', ['teacherName' => 'teacherName']) }}"
                class="inline-block mt-2 underline hover:opacity-70 text-[15px] text-blue-600">{{ $course->teacher->last_name }}
                {{ $course->teacher->first_name }}</a>

            <!-- TODO: 動画やテストをupdateしたらコースもupdateされるように設定 -->
            <p class="mt-3">最終更新日：{{ $course->updated_at->format('Y/m/d') }}</p>

            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <p class="font-bold mr-1">{{ $rate }}</p>
                    <a href="#rate"
                        class="star5_rating text-lg font-medium text-gray-700 underline hover:opacity-70 cursor-pointer"
                        data-rate="{{ $rate }}"></a>

                    <p class="text-sm text-gray-500 ml-1">（{{ number_format($rated_people_num) }}件の評価）</p>
                    <p class="text-sm ml-1">{{ $purchased_count }}人の受講生</p>
                </div>
            </div>

            <div class="flex items-center mt-3">
                <figure>
                    <img src="{{ asset('img/movie.png') }}" class="w-7 h-auto">
                </figure>
                <span class="text-sm ml-1">{{ number_format($movie_total_time) }}時間の動画</span>
            </div>

            @if (Auth::guard('teacher')->id() === $course->teacher_id)
                <div>
                    <a
                        href="{{ route('course.edit', ['teacherName' => $course->teacher->last_name_en . $course->teacher->first_name_en, 'courseName' => $course->course_url]) }}">
                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-blue-300 hover:opacity-70 py-3 px-5 text-center w-full lg:w-1/5 my-5 font-bold text-lg">編集する</button>
                        </div>
                    </a>
                </div>
            @else
                <div>
                    <a
                        href="{{ route('movie', ['teacherName' => 'teacherName', 'courseName' => 'courseName', 'movieId' => 'movieId']) }}">
                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-blue-300 hover:opacity-70 py-3 px-5 text-center w-full lg:w-1/5 my-5 font-bold text-lg">受講する</button>
                        </div>
                    </a>
                </div>
            @endif

            <div class="mt-10">
                <h3 class="text-xl font-semibold text-gray-800">コースの内容</h3>

                <hr class="mt-3 border-gray-200 dark:border-gray-700">

                <div class="">
                    @foreach ($course->chapters as $chapter)
                        @php
                            // １つの章にいくつの動画を持っているか
                            $count_movies = count($chapter->movies);

                            // １つの章に合計で何時間何分の動画が含まれているか
                            $chapter_movie_total_second = 0;
                            foreach ($chapter->movies as $movie) {
                                $chapter_movie_total_second += $movie->second;
                            }
                            $chapter_movie_total_minutes = (int) round($chapter_movie_total_second / 60);
                        @endphp
                        <div class="my-5 accordion">
                            <div class="accordion_header flex items-center focus:outline-none cursor-pointer">
                                <span class="is_open text-gray-400 bg-gray-200 rounded-full block">
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
                                    <h1 class="mx-4 text-xl">{{ $chapter->title }}</h1>
                                    <p class="text-sm ml-auto">
                                        {{ $count_movies }}個のレクチャー・{{ $chapter_movie_total_minutes }}分</p>
                                </div>
                            </div>

                            <div class="accordion_inner flex mt-8 md:mx-10">
                                <ul class="px-2 text-gray-700">
                                    @foreach ($chapter->movies as $movie)
                                        <li class="leading-8 mb-1 flex justify-between">
                                            <div class="flex items-center">
                                                <figure>
                                                    <img src="{{ asset('img/movie.png') }}" class="w-9 h-auto">
                                                </figure>
                                                <p class="ml-1 text-lg">{{ $movie->movie_title }}</p>
                                            </div>
                                            {{-- TODO: "H"消す？ --}}
                                            <p>{{ gmdate('H:i:s', $movie->second) }}</p>
                                        </li>
                                    @endforeach
                                    @foreach ($chapter->tests as $test)
                                        <li class="leading-8 flex items-center">
                                            <figure>
                                                <img src="{{ asset('img/file.png') }}" class="w-10 h-auto">
                                            </figure>
                                            <p class="text-lg">{{ $test->title }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <hr class="mt-3 border-gray-200 dark:border-gray-700">
                    @endforeach

                </div>
            </div>

            <div class="mt-10">
                <h3 class="text-xl font-semibold text-gray-800">コースの説明</h3>

                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <p class="mt-2">
                    {!! nl2br(e($course->outline)) !!}
                </p>
            </div>

            @if ($course->target)
                <div class="mt-10">
                    <h3 class="text-xl font-semibold text-gray-800">コースの対象受講者</h3>

                    <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

                    <p class="mt-2">
                        {!! nl2br(e($course->target)) !!}
                    </p>
                </div>
            @endif

            @if ($course->need)
                <div class="mt-10">
                    <h3 class="text-xl font-semibold text-gray-800">受講における前提条件</h3>

                    <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

                    <p class="mt-2">
                        {!! nl2br(e($course->need)) !!}
                    </p>
                </div>
            @endif

            <div id="rate" class="mt-7 pt-3">
                <h3 class="text-xl font-semibold text-gray-800">このコースの評価</h3>

                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

                <ul class="mt-2">
                    @foreach ($course->rates as $rate)
                        @if ($loop->index == 4)
                        @break
                    @endif
                    <li>
                        <div class="flex items-center focus:outline-none">
                            <img class="object-cover w-12 h-12 rounded-full ring ring-gray-300 dark:ring-gray-600"
                                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                                alt="">
                            <div class="ml-4">
                                <p class="font-bold text-lg">{{ $rate->users[0]->user_name }}</p>
                                <div class="flex items-center text-gray-600">
                                    <span class="star5_rating mr-3"
                                        data-rate="{{ sprintf('%.1f', $rate->rate) }}"></span>
                                    <span>{{ \Util::getDateDiff($rate->created_at) }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 ml-16 text-md text-gray-700">
                        <p class="mt-2">
                            {!! nl2br(e($rate->comment)) !!}
                        </p>
                        </p>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </li>
                @endforeach
            </ul>

            <div x-data="{ isOpen: true }" class="relative flex justify-center">
                @if (count($course->rates) > 5)
                    <button
                        class="modal_open px-6 py-2 mx-auto tracking-wide capitalize transition-colors duration-300 transform bg-blue-300 rounded-md hover:opacity-70 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        もっと見る
                    </button>
                @endif

                {{-- モーダル --}}
                <div x-show="isOpen" x-transition:enter="transition duration-300 ease-out"
                    x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
                    x-transition:leave="transition duration-150 ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
                    x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                    class="modal_container fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                    role="dialog" aria-modal="true">
                    <div
                        class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>

                        <div
                            class="modal_body relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-900 sm:my-8 sm:align-middle w-11/12 sm:p-6">
                            <ul class="mt-2" id="rate_modal">
                                @foreach ($course->rates as $rate)
                                    <li>
                                        <div class="flex items-center focus:outline-none">
                                            <img class="object-cover w-12 h-12 rounded-full ring ring-gray-300 dark:ring-gray-600"
                                                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                                                alt="">
                                            <div class="ml-4">
                                                <p class="font-bold text-lg">{{ $rate->users[0]->user_name }}</p>
                                                <div class="flex items-center text-gray-600">
                                                    <span class="star5_rating mr-3"
                                                        data-rate="{{ sprintf('%.1f', $rate->rate) }}"></span>
                                                    <span>{{ \Util::getDateDiff($rate->created_at) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 ml-16 text-md text-gray-700">
                                        <p class="mt-2">
                                            {!! nl2br(e($rate->comment)) !!}
                                        </p>
                                        </p>
                                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-5 sm:flex sm:items-center sm:justify-between">
                                <div class="sm:flex sm:items-center">
                                    <button
                                        class="modal_close w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:mt-0 sm:w-auto sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                                        閉じる
                                    </button>

                                    <button
                                        class="modal_more w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide capitalize transition-colors duration-300 transform bg-blue-300 rounded-md sm:w-auto sm:mt-0 hover:opacity-70 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        もっと見る
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    });
</script>
@endsection
