@extends('Layouts.app')

@section('style')
    <style>
        .tab_menu_item.is_active {}
    </style>
@endsection

@section('content')
    <div class="my-5">
        <img class="object-cover object-center w-full h-96 rounded-lg"
            src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
            alt="">

        <ul
            class="tab_menu flex overflow-x-auto overflow-y-hidden border-b border-gray-200 whitespace-nowrap dark:border-gray-700 mt-5">
            <li class="tab_menu_item is_active inline-flex items-center h-10 px-4 -mb-px text-sm text-center bg-transparent border-b-2 sm:text-base whitespace-nowrap focus:outline-none cursor-pointer text-blue-600 border-blue-500"
                data-tab="01">
                コース内容
            </li>
            <li class="tab_menu_item inline-flex items-center h-10 px-4 -mb-px text-sm text-center bg-transparent border-b-2 sm:text-base whitespace-nowrap focus:outline-none cursor-pointer border-transparent hover:border-gray-400 text-gray-700"
                data-tab="02">
                Q & A
            </li>
        </ul>

        <div class="tab_panel mt-10">
            <!-- コース内容 -->
            <div class="tab_panel_box is_show block" data-panel="01">
                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>

                        <div class="flex items-center w-full">
                            <h1 class="mx-4 text-xl">アルゴリズムと計算量</h1>
                            <p class="text-sm ml-auto">2個のレクチャー・15分</p>
                        </div>
                    </div>

                    <div class="flex mt-8 md:mx-10">
                        <ul class="max-w-3xl px-4 text-gray-700">
                            <li class="leading-8 cursor-pointer hover:underline flex items-center">
                                <input type="checkbox" name="" id="">
                                <a
                                    href="{{ route('movie', ['teacherName' => 'teacherName', 'courseName' => 'courseName', 'movieId' => 'movieId']) }}">
                                    <p class="ml-2">アルゴリズムとデータ構造とは</p>
                                </a>
                            </li>
                            <li class="leading-8 cursor-pointer hover:underline flex items-center">
                                <input type="checkbox" name="" id="">
                                <a
                                    href="{{ route('movie', ['teacherName' => 'teacherName', 'courseName' => 'courseName', 'movieId' => 'movieId']) }}">
                                    <p class="ml-2">Big O Notaion（Big O 記法）と安定ソートとは</p>
                                </a>
                            </li>
                            <li class="leading-8 cursor-pointer hover:underline flex items-center">
                                <input type="checkbox" name="" id="">
                                <a
                                    href="{{ route('testQuestion', ['courseName' => 'courseName', 'testId' => 'testId', 'userId' => 'userId']) }}">
                                    <p class="ml-2">小テスト</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-white bg-blue-500 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>

                        <div class="flex items-center w-full">
                            <h1 class="mx-4 text-xl">ソート</h1>
                            <p class="text-sm ml-auto">14個のレクチャー・2時間11分</p>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-white bg-blue-500 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>

                        <div class="flex items-center w-full">
                            <h1 class="mx-4 text-xl">サーチ</h1>
                            <p class="text-sm ml-auto">1個のレクチャー・14分</p>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-white bg-blue-500 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>

                        <div class="flex items-center w-full">
                            <h1 class="mx-4 text-xl">リンクリスト</h1>
                            <p class="text-sm ml-auto">6個のレクチャー・1時間22分</p>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-white bg-blue-500 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>

                        <div class="flex items-center w-full">
                            <h1 class="mx-4 text-xl">ハッシュテーブル</h1>
                            <p class="text-sm ml-auto">2個のレクチャー・32分</p>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">
            </div>

            <!-- Q & A -->
            <div class="tab_panel_box hidden" data-panel="02">

                <hr class="mb-8 border-gray-200 dark:border-gray-700">

                <a
                    href="{{ route('comment.show', ['answerId' => 'answerId', 'commentId' => 'commentId', 'courseName' => 'courseName']) }}">
                    <div class="flex items-center focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                            alt="">

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">Pythonでの負数の剰余算について(質問ではないのですが...)</h1>
                    </div>
                    <div class="flex items-center text-sm ml-12 mt-2">
                        <span>田中</span>
                        <span class="ml-2">2年前</span>
                    </div>
                </a>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <a
                    href="{{ route('comment.show', ['answerId' => 'answerId', 'commentId' => 'commentId', 'courseName' => 'courseName']) }}">
                    <div class="flex items-center focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                            alt="">

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">シンメトリックのペアを探す</h1>
                    </div>
                    <div class="flex items-center text-sm ml-12 mt-2">
                        <span>田中</span>
                        <span class="ml-2">2年前</span>
                    </div>
                </a>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <a
                    href="{{ route('comment.show', ['answerId' => 'answerId', 'commentId' => 'commentId', 'courseName' => 'courseName']) }}">
                    <div class="flex items-center focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                            alt="">

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">タイポかな？</h1>
                    </div>
                    <div class="flex items-center text-sm ml-12 mt-2">
                        <span>田中</span>
                        <span class="ml-2">2年前</span>
                    </div>
                </a>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <a
                    href="{{ route('comment.show', ['answerId' => 'answerId', 'commentId' => 'commentId', 'courseName' => 'courseName']) }}">
                    <div class="flex items-center focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                            alt="">

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">bucket sortのindexについて</h1>
                    </div>
                    <div class="flex items-center text-sm ml-12 mt-2">
                        <span>田中</span>
                        <span class="ml-2">2年前</span>
                    </div>
                </a>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <a
                    href="{{ route('comment.show', ['answerId' => 'answerId', 'commentId' => 'commentId', 'courseName' => 'courseName']) }}">
                    <div class="flex items-center focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100"
                            alt="">

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">selectionソートのfor文のところ</h1>
                    </div>
                    <div class="flex items-center text-sm ml-12 mt-2">
                        <span>田中</span>
                        <span class="ml-2">2年前</span>
                    </div>
                </a>

                <hr class="my-8 border-gray-200 dark:border-gray-700">
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        // タブ切り替え
        const tabMenus = document.querySelectorAll('.tab_menu_item');

        tabMenus.forEach((tabMenu) => {
            tabMenu.addEventListener('click', tabSwitch);
        })

        function tabSwitch(e) {
            const tabTargetData = e.currentTarget.dataset.tab;
            const tabList = e.currentTarget.closest('.tab_menu');
            const tabItems = tabList.querySelectorAll('.tab_menu_item');
            const tabPanelItems = tabList.nextElementSibling.querySelectorAll('.tab_panel_box');

            tabItems.forEach((tabItem) => {
                tabItem.classList.remove('is_active');
                tabItem.classList.remove('text-blue-600');
                tabItem.classList.remove('border-blue-500');
                tabItem.classList.add('border-transparent');
                tabItem.classList.add('hover:border-gray-400');
                tabItem.classList.add('text-gray-700');
            })
            tabPanelItems.forEach((tabPanelItem) => {
                tabPanelItem.classList.remove('is_show');
                tabPanelItem.classList.remove('block');
                tabPanelItem.classList.add('hidden');
            })

            e.currentTarget.classList.add('is_active');
            e.currentTarget.classList.add('text-blue-600');
            e.currentTarget.classList.add('border-blue-500');
            e.currentTarget.classList.remove('border-transparent');
            e.currentTarget.classList.remove('hover:border-gray-400');
            e.currentTarget.classList.remove('text-gray-700');
            tabPanelItems.forEach((tabPanelItem) => {
                if (tabPanelItem.dataset.panel === tabTargetData) {
                    tabPanelItem.classList.add('is_show');
                    tabPanelItem.classList.add('block');
                    tabPanelItem.classList.remove('hidden');
                }
            })
        }
    </script>
@endsection
