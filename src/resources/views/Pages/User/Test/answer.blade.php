@extends('Layouts.app')

@section('content')
<div class="my-10">
    <form action="{{ route('testAnswer', ['courseName' => 'courseName', 'testId' => 'testId']) }}">
        @csrf
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="my-6">
            <p class="font-bold text-lg">問題 1</p>
            <p class="my-2">問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト</p>
            <div class="my-4 ml-2">
                <p class="font-semibold mb-2">答え</p>
                <p>回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト</p>
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="my-6">
            <p class="font-bold text-lg">問題 2</p>
            <p class="my-2">問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト</p>
            <div class="my-4 ml-2">
                <p class="font-semibold mb-2">答え</p>
                <p>回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト</p>
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="my-6">
            <p class="font-bold text-lg">問題 3</p>
            <p class="my-2">問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト問題テキスト</p>
            <div class="my-4 ml-2">
                <p class="font-semibold mb-2">答え</p>
                <p>回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト回答テキスト</p>
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-300 py-3 px-5 text-center w-full lg:w-1/5 my-5 font-bold text-lg">完了</button>
        </div>
    </form>
</div>
@endsection