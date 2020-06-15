<nav class="white shadow-sm"
     x-data="{ open: false }">
    <div class="max-w-5xl relative mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-2">
            <div class="flex-1 flex items-center sm:items-stretch sm:justify-start space-x-2">
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


            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="flex items-center">
                    <a href=""
                       class="mr-4  text-gray-800 focus:text-gray-500 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="w-7 h-7"
                             fill="none"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="1"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </a>
                    <a href=""
                       class="mr-4  text-gray-800 focus:text-gray-500 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-7 w-7"
                             fill="none"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="1"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </a>
                    <livewire:notification-drop-down :user="auth()->user()"/>
                </div>
                <!-- Profile dropdown -->
                <div class="ml-3 relative"
                     x-data="{ isOpen: false }">
                    <div>
                        <button class="flex text-sm border border-gray-500 hover:border-indigo-800 rounded-full focus:outline-none  border-white focus:border-indigo-500 transition duration-150 ease-in-out"
                                @click="isOpen = !isOpen">
                            <img class="h-7 w-7 p-0.5 border rounded-full object-cover"
                                 src="{{ asset('storage/'.auth()->user()->profile->avatar) }}"
                                 alt=""/>
                        </button>
                    </div>
                    <div x-show="isOpen"
                         x-transition:enter="transition ease-out duration-150 transform"
                         x-transition:enter-start="opacity-0 scale-0"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150 transform"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-0"
                         @click.away="isOpen = false "
                         @keydown.escape.window="isOpen = false"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-md">
                            <a href="{{ route('profile.show', auth()->user()->username) }}"
                               class="block px-4 py-2 text-sm leading-5 text-gray-700 rounded-t-md hover:bg-indigo-500 hover:text-white focus:outline-none transition duration-150 ease-in-out">
                                <i class="fas fa-user mr-4"></i> Your Profile </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:text-white hover:bg-indigo-500 focus:outline-none transition duration-150 ease-in-out">
                                <i class="fas fa-cog mr-4"></i>Settings</a>
                            <form action="{{route('logout')}}"
                                  method="post">
                                @csrf
                                <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-indigo-500 hover:text-white rounded-b-md focus:outline-none transition duration-150 ease-in-out">
                                    <i class="fas fa-sign-out-alt mr-4"></i>Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
