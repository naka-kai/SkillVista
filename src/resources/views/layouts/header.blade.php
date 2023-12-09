<!-- Require css -->
<style>
    .scroll-hidden::-webkit-scrollbar {
        height: 0px;
        background: transparent;
        /* make scrollbar transparent */
    }
</style>

<nav x-data="{ isOpen: false }" class="relative bg-white shadow">
    <div class="container px-6 py-3 mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="#">
                        <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                    </a>

                    <!-- Search input on desktop screen -->
                    <div class="hidden mx-10 md:block">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>

                            <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search">
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>
                
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-2 transition-all duration-300 ease-in-out bg-white top-24 md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
                <div class="flex flex-col md:flex-row md:mx-1">
                    <a class="my-2 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Home</a>
                    <a class="my-2 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Blog</a>
                    <a class="my-2 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Compoents</a>
                    <a class="my-2 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Courses</a>
                </div>

                <div class="hidden lg:block">
                    <a class="relative text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-300" href="#">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.70711 15.2929C4.07714 15.9229 4.52331 17 5.41421 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM9 19C9 20.1046 8.10457 21 7 21C5.89543 21 5 20.1046 5 19C5 17.8954 5.89543 17 7 17C8.10457 17 9 17.8954 9 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="absolute top-0 left-0 p-1 text-xs text-white bg-blue-500 rounded-full"></span>
                    </a>
                </div>

                <div class="flex items-center mt-4 lg:mt-0">
                    <button class="hidden mx-4 text-gray-600 transition-colors duration-300 transform lg:block dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 focus:text-gray-700 dark:focus:text-gray-400 focus:outline-none" aria-label="show notifications">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button type="button" class="hidden lg:block flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                        <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                        </div>

                        <h3 class="mx-2 text-gray-700 dark:text-gray-200 lg:hidden">Khatab wedaa</h3>
                    </button>
                </div>

                <!-- Search input on mobile screen -->
                <div class="my-4 md:hidden">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>

                        <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>

        <div class="py-3 mt-3 -mx-3 overflow-y-auto whitespace-nowrap scroll-hidden">
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">News</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Articles</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Videos</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Tricks</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">PHP</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Laravel</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Vue</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">React</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Tailwindcss</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Meraki UI</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">CPP</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">JavaScript</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Ruby</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Mysql</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Pest</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">PHPUnit</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Netlify</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">VS Code</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">PHPStorm</a>
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform hover:text-blue-600 hover:underline md:my-0" href="#">Sublime</a>
        </div>
    </div>
</nav>