<header>
    <nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800">
        <div class="container px-6 py-3 mx-auto">
            <div class="flex justify-between items-center">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('top') }}" class="font-bold text-[30px]">SkillVista</a>
                    </div>

                    <div class="flex justify-center items-center">
            
                        <!-- SP menu button -->
                        <div class="flex lg:hidden hidden">
                            <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                </svg>
                        
                            </button>
                        </div>
                    </div>
                    
                </div>
    
                <!-- SP Menu open: "block", Menu closed: "hidden" -->
                <div class="z-20 transition-all duration-300 ease-in-out mt-0 p-0 top-0 relative bg-transparent opacity-100 translate-x-0 mx-0 w-full flex justify-end">
                    <div class="px-0 flex flex-row justify-end items-center mx-0 h-auto w-full">
                        <!-- SP-profile -->
                        <button type="button" class="my-2 lg:hidden items-center focus:outline-none hidden" aria-label="toggle profile dropdown">
                            <h3 class="mx-2 text-gray-700 dark:text-gray-200 lg:hidden">Kai</h3>
                            <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                            </div>
                        </button>

                        <!-- PC-search -->
                        <div class="my-4 mx-4">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
        
                                <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search">
                            </div>
                        </div>
                        
                        <div class="flex items-center mt-0">
        
                            <!-- PC-profile -->
                            <ul>
                                <!-- Authentication Links -->
                                @if (Auth::guard('user')->check())
                                    <li>
                                        <div class="items-center flex-row flex justify-center">
                                            <a class="text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 mx-4 my-0 text-center w-full" href="{{ route('user.myCourse', ['userName' => 'userName']) }}">マイコース</a>
                                            <a class="text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline mx-4 my-0" href="{{ route('user.wishList', ['userName' => 'userName']) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path d="M12 9.229c.234-1.12 1.547-6.229 5.382-6.229 2.22 0 4.618 1.551 4.618 5.003 0 3.907-3.627 8.47-10 12.629-6.373-4.159-10-8.722-10-12.629 0-3.484 2.369-5.005 4.577-5.005 3.923 0 5.145 5.126 5.423 6.231zm-12-1.226c0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-7.962-9.648-9.028-12-3.737-2.338-5.262-12-4.27-12 3.737z"/>
                                                </svg>
                                            </a>
                                            <a href="{{ route('user.profile.show', ['userName' => 'userName']) }}" class="flex items-center focus:outline-none ml-4">
                                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @elseif (Auth::guard('teacher')->check())
                                    <li>
                                        <div class="items-center flex-row flex justify-center">
                                            <a class="text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 mx-4 my-0 text-center w-full" href="{{ route('teacher.myCourse', ['teacherName' => $loginTeacher->user()->last_name_en . $loginTeacher->user()->first_name_en]) }}">マイコース</a>
                                            <a href="{{ route('teacher.profile.show', ['teacherName' => $loginTeacher->user()->last_name_en . $loginTeacher->user()->first_name_en]) }}" class="flex items-center focus:outline-none ml-4">
                                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                                    <img src="{{ $loginTeacher->user()->image == null || '' ? asset('img/kkrn_icon_user_13.png') : asset($teacher->image) }}" class="object-cover w-full h-full" alt="avatar">
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @else
                                    <div class="flex items-center">
                                        <li class="ml-3 py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70">
                                            <a href="{{ route('selectLogin') }}">{{ __('ログイン') }}</a>
                                        </li>
                                    </div>
                                @endif
                            </ul>
                        </div>
        
                        <!-- SP-search -->
                        <div class="my-4 lg:hidden w-full hidden">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
        
                                <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search">
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
            <div class="py-3 mt-3 -mx-3 overflow-y-auto whitespace-nowrap header-scroll-hidden">
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">News</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Articles</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Videos</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Tricks</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">PHP</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Laravel</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Vue</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">React</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Tailwindcss</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Meraki UI</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">CPP</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">JavaScript</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Ruby</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Mysql</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Pest</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">PHPUnit</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Netlify</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">VS Code</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">PHPStorm</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline lg:my-0" href="#">Sublime</a>
            </div>
        </div>
    </nav>
</header>