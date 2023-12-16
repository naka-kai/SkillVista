@extends('Layouts.app')

@section('content')
    <div class="my-20">
        <div class="flex items-center justify-start">
            <img class="flex-shrink-0 object-cover w-56 h-56 rounded-full sm:mx-4 ring-4 ring-gray-300"
                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                alt="">

            <div>
                <div class="mt-4 ml-4">
                    <h1 class="text-4xl font-semibold text-gray-700">田中 太郎</h1>

                    <p class="mt-2 text-gray-500 text-lg">Tanaka Taro</p>
                </div>
                <div class="flex flex-col lg:flex-row mt-6 ml-2">
                    <a href="#"
                        class="flex items-center mx-2 border-2 py-1 px-5 text-gray-600 w-40 justify-center rounded-md my-1 hover:opacity-70"
                        aria-label="Reddit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
                        <p class="ml-2">Webサイト</p>
                    </a>

                    <a href="#"
                        class="flex items-center mx-2 border-2 py-1 px-5 text-gray-600 w-40 justify-center rounded-md my-1 hover:opacity-70"
                        aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="27" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                        <p class="ml-2">YouTube</p>
                    </a>

                    <a href="#"
                        class="flex items-center mx-2 border-2 py-1 px-5 text-gray-600 w-40 justify-center rounded-md my-1 hover:opacity-70"
                        aria-label="Github">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex items-center mt-5 font-bold">
            <div>
                <p class="text-md text-gray-500">受講生の総数</p>
                <p class="text-2xl text-gray-800">177,391</p>
            </div>
            <div class="ml-5">
                <p class="text-md text-gray-500">レビュー</p>
                <p class="text-2xl text-gray-800">42,581</p>
            </div>
        </div>
        <h3 class="mt-10 text-xl font-semibold text-gray-800">プロフィール</h3>
        <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
        <p class="mt-5 text-gray-500 text-xl">1998年同志社大学神学部卒業。サッカー推薦で入学し、在学中は大学日本代表に選出。2001年の東アジア競技大会で金メダルを取得。2004年北陸先端科学技術大学院大学情報科学専攻修士卒業。2004年NTTドコモ入社、2005年米国ハワイで起業、会社経営を2年する。その後、2006年米国スタートアップの会社に転職するも2008年のリーマンショックで倒産。2009年米国NTTi3で勤務をした後に、2012年米国本社Splunk, Incでソフトウェアエンジニアとして現在に至る。</p>
    </div>
@endsection
