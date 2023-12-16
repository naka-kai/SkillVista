@extends('Layouts.app')

@section('content')
<div class="my-5">
    <img class="object-cover object-center w-full h-96 rounded-lg" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

    <div class="mt-8">
        <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
            現役シリコンバレーエンジニアが教えるアルゴリズム・データ構造・コーディングテスト入門
        </h1>

        <p class="mt-2">前半はアルゴリズムとデータ構造の基礎をPythonを用いて習得し、後半にはコーディング面接対策も行います。</p>

        <a href="{{ route('teacher', ['teacherName' => 'teacherName']) }}" class="inline-block mt-2 underline hover:opacity-70 text-[15px] text-blue-600">山田 太郎</a>

        <p class="mt-3">最終更新日：2023/12/12</p>

        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <p class="font-bold mr-1">5.0</p>
                <a href="#rate" class="text-lg font-medium text-gray-700 dark:text-gray-300 underline hover:text-gray-500 cursor-pointer">★★★★★</a>

                <p class="text-sm text-gray-500 ml-1">（23,415件の評価）</p>
                <p class="text-sm ml-1">112,253人の受講生</p>
            </div>
        </div>

        <div class="flex items-center mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
            </svg>
            <span class="text-sm ml-2">13時間の動画</span>
        </div>

        <div>
            <form action="{{ route('movie', ['courseName' => 'courseName', 'movieId', 'movieId']) }}">
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-300 py-3 px-5 text-center w-full lg:w-1/5 my-5 font-bold text-lg">受講する</button>
                </div>
            </form>
        </div>

        <div class="mt-10">            
            <h3 class="text-xl font-semibold text-gray-800">コースの内容</h3>

            <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

            <div>
                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-gray-400 bg-gray-200 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <li class="leading-8 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
                                </svg>
                                <p class="ml-2">アルゴリズムとデータ構造とは</p>
                            </li>
                            <li class="leading-8 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
                                </svg>
                                <p class="ml-2">Big O Notaion（Big O 記法）と安定ソートとは</p>
                            </li>
                            <li class="leading-8 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                </svg>
                                <p class="ml-2">小テスト</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <div class="flex items-center focus:outline-none cursor-pointer">
                        <span class="text-white bg-blue-500 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
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
        </div>

        <div class="mt-10">
            <h3 class="text-xl font-semibold text-gray-800">コースの説明</h3>

            <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">
            <p class="mt-2">
                恐らく、皆さん「アルゴリズムって本当に必要なの？」っと疑問に思っている方もいらっしゃるかと思います。例えば、「実際の現場であまり使わないなー」とか、「今の仕事はWEBのフレームワークのやり方さえ覚えれば、WEBアプリなんて簡単に作れちゃうし」などなどあるとは思います。<br>
                <br>

                ただ、考えていただきたいのですが、なぜあのGAFAと言われるGoogle、Apple, Facebook、Amazonが入社試験で必ずアルゴリズム、データ構造のコーディング面接があるかを考えてみてください。<br>
                <br>

                皆さんもお聞きしたことがあるかもしれませんが、Google検索アルゴリズム、Tesla自動運転アルゴリズムなど世界をリードして最先端の技術革新をしている会社では、ちょっとでもコードが早くなるように、プログラマーが、最適なコードを書く必要があるのです。<br>
                <br>

                もしかすると、単に、今の世の中にあるWEBフレームワークなどを単純に使いこなして、小規模なWEBページなどを構築するだけの簡単な仕事だったら必要ないのかもしれません。ただし、日本でも人気のサービスとなった多くのシステムでは、スケーラビリティーの問題に直面するはずです。初めはアルゴリズムなんて気にせずに動くだけのコードでよかったとしても、データー量が増えてきたら処理に時間がかかるコードはネックになります。そんな時に、アルゴリズムの最適化の知識があるエンジニアは重宝されるわけです。<br>
                <br>

                シリコンバレーでエンジニアとして働くには、入社試験で、必ずアルゴリズムのコーディング面接があり、それを突破しなければ、働けません。コーディング面接がない企業は聞いたことがありません。<br>
                <br>

                日本のエンジニア採用では、志望動機やコミュニケーション力を重視される面接ですが、アメリカでは、志望動機よりもコーディングスキルが重要視されます。<br>
                <br>

                今後の日本のエンジニア採用がどうなるかわかりませんが、日本Googleでもコーディング面接があるように、今後の有名企業でのエンジニアではアルゴリズムのコーディング面接が必須になってくることも考えられるかと思います。<br>
                <br>

                本コースでは、前半にPythonを用いてアルゴリズムとデータ構造を基礎からしっかり学び、後半にはコーディング面接対策をカバーしたコースとなっております。Pythonの基礎をおさえていれば、アルゴリズムの基礎から習得できるコースとなっておりますので、ご安心ください。それでは、コースでお会いできれば幸いです！
            </p>
        </div>

        <div class="mt-10">
            <h3 class="text-xl font-semibold text-gray-800">コースの対象受講者</h3>

            <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

            <ul class="list-disc list-inside mt-2">
                <li>アルゴリズムやデータ構造の基礎を習得したい方</li>
                <li>アルゴリズム面接の対策準備をしたい方</li>
            </ul>
        </div>

        <div class="mt-10">
            <h3 class="text-xl font-semibold text-gray-800">受講における前提条件</h3>

            <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

            <ul class="list-disc list-inside mt-2">
                <li>Pythonの基礎</li>
            </ul>
        </div>

        <div id="rate" class="mt-7 pt-3">
            <h3 class="text-xl font-semibold text-gray-800">このコースの評価</h3>

            <hr class="mt-3 mb-5 border-gray-200 dark:border-gray-700">

            <ul class="mt-2">
                @for ($i = 0; $i < 10; $i++)
                    <li>
                        <div class="flex items-center focus:outline-none">
                            <img class="object-cover w-12 h-12 rounded-full ring ring-gray-300 dark:ring-gray-600" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=880&h=880&q=100" alt="">
                            <div class="ml-4">
                                <p class="font-bold text-lg">田中</p>
                                <div class="flex items-center text-gray-600">
                                    <span class="mr-3">★★★★★</span>
                                    <span>2年前</span>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 ml-16 text-md text-gray-700">
                            以前に米国大学でコンピュータサイエンスのコースを受講しました。本コースはとてもよい復習になりました。<br>
                            <br>
                        
                            コンピュータサイエンスコースではC言語とLispでデータ構造の説明を受けましたが、Pythonでも同様な構造ができることを知りました。また、Pythonのデータ型などについても勉強になりました。
                        </p>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </li>
                @endfor
            </ul>
        </div>

    </div>
</div>
<div class="flex flex-col">
    teacher
    <a href="{{ route('course.edit', ['courseName' => 'courseName', 'teacherName' => 'teacherName']) }}">コース編集</a>
    <a href="{{ route('teacher.myCourse', ['teacherName' => 'teacherName']) }}">マイコースに戻る</a>
</div>
@endsection