<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between py-4">
            <div class="flex-1 flex items-center sm:items-stretch sm:justify-start">
                <a href="{{route('home.index')}}"
                   class="flex items-center justify-between">
                    <div>
                        <h2 class="hidden md:block text-gray-800 text-base font-normal hover:text-gray-800">
                            <img src="{{ asset('images/logo.png') }}"
                                 class="h-7"
                                 alt=""></h2>
                        <h2 class="md:hidden text-gray-800 text-base font-normal hover:text-gray-800">
                            <img src="{{ asset('images/logo-sm.svg') }}"
                                 class="h-7"
                                 alt=""></h2>
                    </div>
                </a>
            </div>
            <div class="space-x-2 md:space-x-6">
                <a href="{{route('login')}}"
                   class="md:bg-indigo-700 px-3 rounded-md py-1 md:py-2 text-sm font-normal md:font-medium leading-5 text-gray-500 @if(request()->routeIs('login')) text-indigo-800 @endif hover:text-white  focus:outline-none  transition duration-200 ease-in-out">Login</a>
                <a href="{{route('register')}}"
                   class="py-1 md:py-2 text-sm font-normal md:font-medium leading-5 text-gray-500 @if(request()->routeIs('register')) text-indigo-800 @endif hover:text-indigo-800  focus:outline-none focus:text-indigo-800 transition duration-200 ease-in-out">Register</a>
            </div>
        </div>
    </div>
</nav>
