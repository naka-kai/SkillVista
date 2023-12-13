@extends('Layouts.app')

@section('content')
<div class="my-10">
    <form action="{{ route('testAnswer', ['courseName' => 'courseName', 'testId' => 'testId']) }}">
        @csrf
        <hr class="my-8 border-gray-200 dark:border-gray-700">

        <div class="my-6">
            <p class="font-bold text-lg">問題 1</p>
            <p class="my-2">問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト</p>
            <div class="mt-4 ml-2">
                <div class="flex items-center mb-3">
                    <input id="question1-1" type="radio" value="" name="question1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question1-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え a</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question1-2" type="radio" value="" name="question1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question1-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え b</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question1-3" type="radio" value="" name="question1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question1-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え c</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question1-4" type="radio" value="" name="question1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question1-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え d</label>
                </div>
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="my-6">
            <p class="font-bold text-lg">問題 2</p>
            <p class="my-2">問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト</p>
            <div class="mt-4 ml-2">
                <div class="flex items-center mb-3">
                    <input id="question2-1" type="radio" value="" name="question2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question2-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え a</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question2-2" type="radio" value="" name="question2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question2-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え b</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question2-3" type="radio" value="" name="question2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question2-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え c</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question2-4" type="radio" value="" name="question2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question2-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え d</label>
                </div>
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="my-6">
            <p class="font-bold text-lg">問題 3</p>
            <p class="my-2">問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト</p>
            <div class="mt-4 ml-2">
                <div class="flex items-center mb-3">
                    <input id="question3-1" type="radio" value="" name="question3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question3-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え a</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question3-2" type="radio" value="" name="question3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question3-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え b</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question3-3" type="radio" value="" name="question3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question3-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え c</label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="question3-4" type="radio" value="" name="question3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="question3-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">答え d</label>
                </div>
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-300 py-3 px-5 text-center w-full lg:w-1/5 my-5 font-bold text-lg">送信</button>
        </div>
    </form>
</div>
@endsection