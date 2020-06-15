<div class="relative"
     x-data="{ isMenu: false}">
    <button @click="isMenu = !isMenu"
            @keydown.escape="isMenu = false"
            class="focus:outline-none focus:text-red-600 active:text-red-600">
        <svg
            class="h-6 w-6 cursor-pointer"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
        </svg>
    </button>
    <div class="origin-top-right absolute right-0 rounded-md shadow-lg w-36 bg-white z-20"
         x-show="isMenu"
         @click.away="isMenu = false"
         x-transition:enter="transition transform origin-top-right ease-out duration-150"
         x-transition:enter-start="opacity-0  scale-75"
         x-transition:enter-end="opacity-100  scale-100"
         x-transition:leave="transition transform origin-top-right ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-75">
        <ul class="text-sm text-gray-600">
            @if(!request()->routeIs('post.show'))
                <a href="{{ route('post.show', $post->id) }}">
                    <li class="px-3 py-1 hover:bg-indigo-600 hover:text-gray-100 cursor-pointer rounded-t">
                        Go to post
                    </li>
                </a>
            @endif
            @can('update', $post)
                <a href="{{ route('post.edit', $post->id) }}">
                    <li class="px-3 py-1 hover:bg-indigo-600 hover:text-gray-100 cursor-pointer">
                        Edit
                    </li>
                </a>
            @endif
            @can('delete', $post)
                <div x-data="{isOpen: false}">
                    <li @click="{isOpen = !isOpen}"
                        class="px-3 py-1 hover:bg-indigo-600 hover:text-gray-100 cursor-pointer">
                        Delete
                    </li>
                    <div x-show="isOpen"
                         x-transition:enter="transition origin-bottom md:origin-center ease-out duration-150"
                         x-transition:enter-start="opacity-0 "
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition origin-bottom md:origin-center ease-in duration-150"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="flex fixed top-0 left-0 w-screen h-screen z-50 items-end md:items-center justify-center modal-bg">
                        <div @click.away="isOpen = false"
                             @keydown.window.escape="isOpen = false"
                             class="bg-white md:rounded w-full md:w-auto py-6 px-6 md:px-10 md:py-10 flex items-center justify-center">
                            <div>
                                <div>
                                    <p class="text-gray-700 text-sm">Are you sure you want to delete this post?</p>
                                    <p class="text-gray-700 text-sm">This action cannot be undone.</p>
                                </div>
                                <div class="space-x-4 flex items-center justify-center mt-8">
                                    <button class="px-4 py-1 bg-red-600 text-gray-50 rounded border border-red-600 hover:bg-red-500"
                                            wire:click="delete">
                                        Delete
                                    </button>
                                    <button class="px-4 py-1 border border-gray-400 text-gray-500 rounded hover:bg-gray-100"
                                            @click="{isOpen = false}">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @cannot('update', $post)
                <div x-data="{isOpen: false}">
                    <li @click="{isOpen = !isOpen}"
                        class="px-3 py-1 hover:bg-indigo-600 hover:text-gray-100 cursor-pointer">
                        Unfollow
                    </li>
                    <div x-show="isOpen"
                         x-transition:enter="transition origin-bottom md:origin-center ease-out duration-150"
                         x-transition:enter-start="opacity-0 "
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition origin-bottom md:origin-center ease-in duration-300"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed top-0 left-0 w-screen h-screen z-50 flex items-end md:items-center justify-center modal-bg ">
                        <div @click.away="isOpen = false"
                             @keydown.window.escape="isOpen = false"
                             class="bg-white md:rounded w-full md:w-auto py-6 px-6 md:px-10 md:py-10 flex items-center justify-center">
                            <div>
                                <div>
                                    <p class="text-gray-700 text-sm">Are you sure you want to
                                        unfollow {{$post->user->username}}
                                        ?</p>
                                    <p class="text-gray-700 text-sm capitalize">{{$post->user->username}} will miss
                                        you.</p>
                                </div>
                                <div class="space-x-4 flex items-center justify-center mt-8">
                                    <button class="px-4 py-1 bg-red-600 text-gray-50 rounded border border-red-600 hover:bg-red-500"
                                            wire:click="unfollow">
                                        Unfollow
                                    </button>
                                    <button class="px-4 py-1 border border-gray-400 text-gray-500 rounded hover:bg-gray-100"
                                            @click="{isOpen = false}">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li class="px-3 py-1 hover:bg-indigo-600 hover:text-gray-100 cursor-pointer rounded-b">
                    Report
                </li>
            @endcannot
        </ul>
    </div>
</div>
