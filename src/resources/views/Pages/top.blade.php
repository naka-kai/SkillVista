@extends('Layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/rate.css') }}">
@endsection

@section('content')
<div class="flex flex-col">
    <div class="bg-white dark:bg-gray-900">
        <div class="py-10">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">最近の注目コース</h1>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">
            
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($courses as $course)
                @php
                    // 評価を計算
                    $rates = $course->rates;
                    $total_rating = 0;

                    foreach ($rates as $rate) {
                        $total_rating += $rate->rate;
                    }
                    $rated_people_num = count($rates);

                    if ($rated_people_num) {
                        $rate_avg = $total_rating / $rated_people_num;
                        $rate = sprintf('%.1f', $rate_avg);
                    } else {
                        $rate = 0;
                    }
                @endphp
                    <a href="{{ route('course', ['courseName' => $course->course_url]) }}" class="hover:opacity-70">
                        <div class="my-5">
                            <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                            <div class="mt-8">
                                <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                                    {{ $course->title }}
                                </h1>

                                <p class="mt-2">{{ $course->description }}</p>

                                <p class="mt-4 text-sm">{{ $course->teacher->last_name }} {{ $course->teacher->first_name }}</p>

                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center">
                                        <p class="font-bold mr-1">
                                            {{ $rate }}
                                        </p>
                                        <p class="text-lg font-medium text-gray-700 dark:text-gray-300 hover:underline hover:text-gray-500"><span class="star5_rating" data-rate="{{ $rate }}"></span></p>

                                        <p class="text-sm text-gray-500 dark:text-gray-400 ml-1">（{{ $rated_people_num }}）</p>
                                    </div>
                                </div>

                                {{-- <div class="bg-yellow-200 py-2 px-4 w-36 mt-2">
                                    <p class="text-sm text-center">ベストセラー</p>
                                </div> --}}

                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection