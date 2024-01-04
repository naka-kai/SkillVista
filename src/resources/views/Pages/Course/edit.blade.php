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
</style>
@endsection

@section('content')
<form action="{{ route('course.editConfirm', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}" method="POST">
    @csrf
    <div class="my-5">
        <img class="object-cover object-center w-full h-96 rounded-lg" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

        <div class="mt-8">
            <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                {{ $course->title }}
            </h1>

            <p class="mt-2">{{ $course->description }}</p>

            <div class="mt-10">            
                <h3 class="text-xl font-semibold text-gray-800">コースの内容</h3>

                <hr class="mt-3 border-gray-200 dark:border-gray-700">

                <div class="">
                    @foreach ($course->chapters as $chapter)
                    @php
                        // １つの章にいくつの動画を持っているか
                        $count_movies = count($chapter->movies);
                        
                        // TODO: １つの章に合計で何時間何分の動画が含まれているか

                    @endphp
                    <div class="my-5 accordion">
                        <div class="accordion_header flex items-center focus:outline-none cursor-pointer">
                            <span class="is_open text-gray-400 bg-gray-200 rounded-full block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                </svg>
                            </span>
                            <span class="is_close text-white bg-blue-500 rounded-full cursor-pointer hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </span>

                            <div class="flex items-center w-full">
                                <h1 class="mx-4 text-xl">{{ $chapter->title }}</h1>
                            </div>
                        </div>

                        <div class="accordion_inner flex mt-8 md:mx-10">
                            <ul class="max-w-3xl px-4 text-gray-700">
                                @foreach ($chapter->movies as $movie)
                                <li class="leading-8 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
                                    </svg>
                                    <p class="ml-2">{{ $movie->title }}</p>
                                </li>
                                @endforeach
                                @foreach ($chapter->tests as $test)
                                <li class="leading-8 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                    </svg>
                                    <p class="ml-2">{{ $test->title }}</p>
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

            <div class="mt-10">
                <h3 class="text-xl font-semibold text-gray-800">コースの対象受講者</h3>

                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

                <p class="mt-2">
                    {!! nl2br(e($course->target)) !!}
                </p>
            </div>

            <div class="mt-10">
                <h3 class="text-xl font-semibold text-gray-800">受講における前提条件</h3>

                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

                <p class="mt-2">
                    {!! nl2br(e($course->need)) !!}
                </p>
            </div>
        </div>
    </div>
</form>
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