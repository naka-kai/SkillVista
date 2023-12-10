@extends('Layouts.app')

@section('content')
<div class="flex flex-col">
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">recent posts </h1>

                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 transition-colors duration-300 transform dark:text-gray-400 hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                @for ($i = 0; $i < 10; $i++)
                    <a href="{{ route('course', ['courseName' => 'courseName']) }}" class="hover:opacity-70">
                        <div class="my-5">
                            <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                            <div class="mt-8">
                                <span class="text-blue-500 uppercase">category</span>

                                <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                                    What do you want to know about UI
                                </h1>

                                <p class="mt-2 text-gray-500 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam est asperiores vel, ab animi
                                    recusandae nulla veritatis id tempore sapiente
                                </p>

                                <div class="flex items-center justify-between mt-4">
                                    <div>
                                        <p href="#" class="text-lg font-medium text-gray-700 dark:text-gray-300 hover:underline hover:text-gray-500">
                                            John snow
                                        </p>

                                        <p class="text-sm text-gray-500 dark:text-gray-400">February 1, 2022</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                @endfor

            </div>
        </div>
    </section>
    {{-- user --}}
    {{-- <a href="{{ route('user.myCourse', ['userName' => 'userName']) }}">マイコース</a> --}}
    {{-- <a href="{{ route('user.wishList', ['userName' => 'userName']) }}">欲しいものリスト</a> --}}
    {{-- <a href="{{ route('user.profile.show', ['userName' => 'userName']) }}">プロフィール</a> --}}
    <br>
    
    teacher
    <a href="{{ route('teacher.course.myCourse', ['teacherName' => 'teacherName']) }}">マイコース</a>
    <a href="{{ route('teacher.profile.show', ['teacherName' => 'teacherName']) }}">プロフィール</a>
</div>
@endsection