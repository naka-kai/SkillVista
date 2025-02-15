@extends('Layouts.app')

@section('content')
    <div class="my-5">
        <img class="object-cover object-center w-full h-96 rounded-lg"
            src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
            alt="">

        <ul
            class="tab_menu flex overflow-x-auto overflow-y-hidden border-b border-gray-200 whitespace-nowrap dark:border-gray-700 mt-5">
            <li class="tab_menu_item inline-flex items-center h-10 px-4 -mb-px text-sm text-center bg-transparent border-b-2 sm:text-base whitespace-nowrap focus:outline-none cursor-pointer
            @if(auth()->guard('user')->check())
                is_active text-blue-600 border-blue-500
            @else
                text-gray-700 hover:border-gray-400 border-transparent
            @endif
            "
                data-tab="01">
                コース内容
            </li>
            <li class="tab_menu_item inline-flex items-center h-10 px-4 -mb-px text-sm text-center bg-transparent border-b-2 sm:text-base whitespace-nowrap focus:outline-none cursor-pointer
            @if(auth()->guard('teacher')->check())
                is_active text-blue-600 border-blue-500
            @else
                text-gray-700 hover:border-gray-400 border-transparent
            @endif
            "
                data-tab="02">
                Q & A
            </li>
        </ul>

        <div class="tab_panel mt-10">
            <!-- コース内容 -->
            <div class="tab_panel_box
            @if(auth()->guard('user')->check())
                is_show block
            @else
                hidden
            @endif
            " data-panel="01">
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
                                    href="{{ route('movie', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en, 'courseName' => 'courseName', 'movieId' => 'movieId']) }}">
                                    <p class="ml-2">アルゴリズムとデータ構造とは</p>
                                </a>
                            </li>
                            <li class="leading-8 cursor-pointer hover:underline flex items-center">
                                <input type="checkbox" name="" id="">
                                <a
                                    href="{{ route('movie', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en, 'courseName' => 'courseName', 'movieId' => 'movieId']) }}">
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
            <div class="tab_panel_box
            @if(auth()->guard('user')->check())
                hidden
            @else
                is_show block
            @endif
            " data-panel="02">

                <!-- 新規作成ボタン -->
                {{-- <div class="mb-10 flex justify-end">
                    <a href="{{ route('user.comment.create', ['courseName' => $courseName]) }}" class="w-full px-8 py-3 mt-2 text-sm font-medium tracking-wide capitalize transition-colors duration-300 transform bg-white rounded-md sm:w-auto sm:mt-0 hover:opacity-70 focus:outline-none border-2">
                        新規作成
                    </a>
                </div> --}}

                <hr class="mb-8 border-gray-200 dark:border-gray-700">

                @foreach ($qas as $qa)
                    <a
                        href="{{ route('comment.show', ['commentId' => $qa->id, 'courseName' => $courseName]) }}">
                        <div class="flex items-center focus:outline-none">
                            <img class="object-cover w-8 h-8 rounded-full ring ring-gray-300 dark:ring-gray-600"
                                src="{{ $qa->image == null || '' ? asset('img/kkrn_icon_user_13.png') : asset($qa->image) }}">

                            <h1 class="mx-4 text-xl text-gray-700 dark:text-white truncate">{{ $qa->title }}</h1>
                        </div>
                        <div class="flex items-center text-sm ml-12 mt-2">
                            <span>{{ $qa->updated_by }}</span>
                            <span class="ml-2">{{ \Util::getDateDiff($qa->updated_at) }}</span>
                        </div>
                    </a>

                    <hr class="my-8 border-gray-200 dark:border-gray-700">
                @endforeach

                <h1 class="mt-10 text-xl font-semibold text-gray-800 capitalize lg:text-3xl">質問を投稿</h1>
                <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
                <div class="mt-5 mb-10">
                    <form
                        action="{{ route('movie', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en, 'courseName' => $courseName, 'movieId' => 'movieId']) }}"
                        id="form">
                        @csrf
                        <textarea name="title" id="title" class="border border-[#ccc] w-full p-2" placeholder="タイトル" rows="1"></textarea>
                        <textarea name="contents" id="contents" class="hidden"></textarea>
                        <div id="quill_editor" class="pb-16"></div>
                        <div class="flex justify-end mt-3">
                            <button type="button" onclick="clickSubmit();"
                                class="px-10 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-sm hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">送信</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/quillcustom.js') }}"></script>
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

        /* エディター */
        // https://blog.4breaker.com/2020/04/20/post-864/
        var quill = quillEditor('quill_editor');

        const form = document.getElementById('form');
        const contents = document.getElementById('contents');

        function clickSubmit() {
            contents.value = quill.root.innerHTML;
            form.submit();
        }
    </script>
@endsection
