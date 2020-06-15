<div>
    <div class="relative"
         x-data="{ openNotification: false }">
        <div class="relative">
            <button class="p-1 border-2 border-transparent text-gray-700 rounded-full focus:outline-none  transition duration-150 ease-in-out @if($unreadNotificationsCount > 0) text-red-600 @endif"
                    @click="openNotification = !openNotification"
                    wire:click="reload">
                <svg class="h-6 w-6"
                     stroke="currentColor"
                     fill="{{$unreadNotificationsCount > 0 ? 'currentColor' : 'none'}}"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </button>

            @if($unreadNotificationsCount > 0)
                <div class="absolute top-0 right-0 text-green-600 mr-1 p-0 text-xs font-bold">
                    {{ $unreadNotificationsCount }}
                </div>
            @endif
        </div>

        <div x-show="openNotification"
             x-transition:enter="transition ease-out duration-100 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="openNotification = false "
             @keydown.escape.window="openNotification = false"
             class="absolute  right-0 -mr-13 mx-auto w-screen md:w-96 md:rounded-md shadow-md bg-white border">

            @if($notifications)
                @if($notifications->count())
                    <div class="flex justify-between items-center px-4">
                        <h4 class="text-xs font-medium pt-2">Notifications:</h4>
                        <button wire:click="markAllNotificationsAsRead"
                                class="tracking-tight text-xs  font-medium text-indigo-600 focus:outline-none hover:underline">
                            Mark all as read
                        </button>
                    </div>
                    <ul class="text-xs md:text-sm">
                        @foreach($notifications->slice(0, 3) as $notification)
                            @if($notification->type == 'App\Notifications\LikeNotification')
                                <li class="px-4 py-2 border-b {{$notification->read_at != null ? '':'bg-blue-100'}} hover:bg-gray-100">
                                    <a class="block"
                                       href="{{route('post.show', $notification->data['url'])}}">
                                        <div class="flex items-center space-x-2 justify-between">
                                            <div>
                                                <p class="text-xs text-gray-600">
                                                    <span class="font-medium text-gray-700">{{$notification->data['post_liked_by']}}</span>
                                                    liked your post.</p>
                                                <p class="text-left text-xs text-gray-400">{{$notification->created_at->diffForHumans()}}</p>
                                            </div>
                                            <img src="{{ asset('storage/'.$notification->data['post']) }}"
                                                 class="w-10 h-10"
                                                 alt="">
                                        </div>
                                    </a>
                                </li>
                            @endif
                            @if($notification->type == 'App\Notifications\FollowNotification')
                                <li class="px-4 py-2 border-b {{$notification->read_at != null ? '':'bg-blue-100'}} hover:bg-gray-100">
                                    <a class="block"
                                       href="{{route('profile.show', $notification->data['url'])}}">
                                        <div class="flex items-center space-x-2 justify-between">
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    <span class="font-medium text-gray-700">{{$notification->data['user']}}</span>
                                                    is now following your public feeds.</p>
                                                <p class="text-left text-xs text-gray-400">{{$notification->created_at->diffForHumans()}}</p>
                                            </div>
                                            <img src="{{ asset('storage/'.$notification->data['image']) }}"
                                                 class="w-10 h-10"
                                                 alt="">
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div>
                        <button wire:click="clearNotifications"
                                class="tracking-tight py-2 text-xs text-center w-full hover:bg-gray-100 font-medium text-indigo-600 focus:outline-none">
                            Clear Notifications
                        </button>
                    </div>
                @endif
                @if(!$notifications->count())
                    <div wire:loading.remove
                         class="text-xs flex justify-center items-center">
                        <div class="px-4 py-4 text-center font-normal tracking-tight">
                            <div>
                                <p>No Notifications</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if(!$notifications)
                <div
                     class="text-xs flex justify-center items-center">
                    <div class="px-4 py-4 text-center font-normal tracking-tight">
                        <div>
                            <p>No Notifications</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
