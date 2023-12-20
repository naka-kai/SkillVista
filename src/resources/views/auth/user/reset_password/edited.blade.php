@extends('layouts.app')

@section('content')
<div class="bg-white my-20">
    <div class="flex justify-center">
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/3">
            <div class="flex-1">
                <div class="text-center">
                    <p class="mt-3 text-2xl font-semibold tracking-wider text-gray-700 capitalize">パスワード再設定完了</p>
                </div>

                <div class="mt-8 flex flex-col items-center">
                    <p class="text-gray-600">パスワードリセットが完了しました。</p>
                    <a href="{{ route('top') }}" class="mt-6">
                        <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            TOPへ戻る
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
