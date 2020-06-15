@extends('layouts.app')

@section('title')
    {{$user->name."'s Profile"}}
@endsection

@section('content')
    <section class="pt-16 gray">
        <div class="container max-w-5xl mx-auto px-0 md:px-6 lg:px-8">
            <div class="mb-10">
                <div class="hidden md:flex justify-between mb-2 md:mb-6 md:px-0">
                    <div class="md:w-4/12 flex justify-center flex-shrink-0 mb-6 md:mb-0 p-4">
                        <img src="{{ asset('storage/'.$user->profile->avatar) }}"
                             class="w-42 h-42 rounded-full object-cover object-center border-2 border-gray-200 p-1"
                             alt="">
                    </div>
                    <div class="md:w-8/12 md:pl-10 space-y-3 md:space-y-6 md:py-6">
                        <div class="flex space-x-4 items-center justify-start mb-6 md:mb-0 px-4">
                            <h2 class="text-lg md:text-2xl tracking-wide text-center md:text-left">
                                {{ $user->name }}
                            </h2>
                            <div class="flex items-center justify-center space-x-4 mt-6 md:mt-0">
                                @can('update', $user->profile)
                                    <a href="{{ route('profile.edit', $user->username) }}"
                                       class="px-3 py-1 border bg-gray-100 hover:bg-gray-200 capitalize text-sm font-medium text-gray-800 rounded-md">
                                        Edit profile
                                    </a>
                                    <a href="{{ route('post.create') }}"
                                       class="text-gray-500 hover:text-gray-800 w-8 h-8">
                                        <svg fill="none"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </a>
                                @else
                                    <livewire:follow :user="$user"/>
                                @endcan
                            </div>
                        </div>
                        <livewire:profile-stats :user="$user"/>
                        <div class="space-y-0.5 px-4">
                            @can('viewPrivateProfile', $user->profile)
                                <h2 class="text-base md:text-lg tracking-tight font-medium flex items-center">
                                    <span class="font-light text-xs pr-1">@ </span> {{ $user->username }}
                                </h2>
                                <p class="text-sm font-medium md:font-normal md:text-base max-w-lg text-gray-800">
                                    {{ $user->profile->bio }}
                                </p>
                                <div>
                                    <a href="{{ $user->profile->url}}"
                                       target="_blank"
                                       rel="noreferrer"
                                       class="font-medium text-blue-900 text-sm md:text-base">
                                        {{ $user->profile->url }}
                                    </a>
                                </div>
                            @elsecannot('viewPrivateProfile', $user->profile)
                                <h2 class="text-base md:text-lg tracking-tight font-medium">
                                    {{ 'Private Profile' }}
                                </h2>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="md:hidden mb-2">
                    <div class="flex justify-between">
                        <div class="flex justify-center mb-2 p-4">
                            <img src="{{ asset('storage/'.$user->profile->avatar) }}"
                                 class="w-24 h-24 rounded-full object-cover object-center border-2 border-gray-200 p-1"
                                 alt="Profile Picture">
                        </div>
                        <div class="flex-1 w-full flex items-center justify-start">
                            <div class="space-y-3 w-full">
                                <div class="flex items-center space-x-5">
                                    <h2 class="text-2xl tracking-normal font-light">
                                        {{ $user->name }}
                                    </h2>
                                </div>
                                <div class="w-full flex pr-4 space-x-4">
                                    @can('update', $user->profile)
                                        <a href="{{ route('profile.edit', $user->username) }}"
                                           class="px-3 text-center w-1/2 py-1 border bg-gray-100 hover:bg-gray-200 capitalize text-sm font-medium text-gray-800 rounded-md">
                                            Edit profile
                                        </a>
                                        <a href="{{ route('post.create') }}"
                                           class="text-gray-500 hover:text-gray-800 w-8 h-8">
                                            <svg fill="none"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 stroke-width="2"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </a>
                                    @else
                                        <livewire:follow :user="$user"/>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 mb-3">
                        @can('viewPrivateProfile', $user->profile)
                            <h2 class="text-sm font-medium font-medium flex items-center">
                                <span class="font-light text-xs pr-1">@</span>{{ $user->username }}
                            </h2>
                            <p class="text-sm font-normal  max-w-lg text-gray-800">
                                {{ $user->profile->bio }}
                            </p>
                            <div class=" truncate">
                                <a href="{{ $user->profile->url}}"
                                   target="_blank"
                                   rel="noreferrer"
                                   class="font-medium text-blue-900 text-sm">
                                    {{ $user->profile->url }}
                                </a>
                            </div>
                        @elsecannot('viewPrivateProfile', $user->profile)
                            <h2 class="text-sm font-medium font-medium">
                                {{ 'Profile is Private, Follow to see posts'}}
                            </h2>
                        @endcan
                    </div>
                    <livewire:profile-stats :user="$user"/>

                </div>

                @can('viewPrivateProfile', $user->profile)
                    <div class="hidden md:block">
                        <div class="overflow-x-scroll hidden-scroll flex space-x-10 max-w-6xl mx-auto pl-10 justify-start mb-13">
                            <div class="space-y-2 flex-shrink-0">
                                <img src="https://picsum.photos/500?random=1"
                                     class="w-20 h-20 p-0.5 rounded-full border"
                                     alt="">
                                <p class="w-full text-center text-sm">
                                    Memories
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t flex justify-center space-x-6 sm:space-x-10 md:space-x-15 py-4">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 stroke-width="2"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <div class="uppercase text-xs font-medium tracking-wider text-gray-800">posts</div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-gray-500"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 stroke-width="2"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div class="uppercase text-xs font-medium tracking-wider text-gray-500">igtv</div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-gray-500"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 stroke-width="2"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                            <div class="uppercase text-xs font-medium tracking-wider text-gray-500">saved</div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-gray-500"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 stroke-width="2"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <div class="uppercase text-xs font-medium tracking-wider text-gray-500">saved</div>
                        </div>
                    </div>

                    @if($user->post->count() > 0)
                        <div class="grid grid-cols-3 gap-2 md:gap-6 px-2 sm:px-4 md:px-0">
                            @foreach($user->post as $post)
                                <a href="{{ route('post.show', $post->id) }}">
                                    <div class="relative w-full">
                                        <img class="w-full object-cover"
                                             src="{{ asset('storage/'.$post->image) }}"
                                             alt="">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100">
                                            <div class="bg-filter h-full w-full">
                                                <div class="h-full w-full flex flex-col md:flex-row items-center justify-center md:space-x-10 space-y-2 md:space-y-0">
                                                    <div class="flex space-x-2 items-center">
                                                        <svg class="text-white w-6 h-6"
                                                             fill="currentColor"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             stroke-width="2"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                        </svg>
                                                        <p class="font-bold text-white text-sm">{{$post->likes->count()}}</p>
                                                    </div>
                                                    <div class="flex space-x-2 items-center">
                                                        <svg class="text-white w-6 h-6"
                                                             fill="currentColor"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             stroke-width="2"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                                        </svg>
                                                        <p class="text-white font-bold text-sm">{{$post->comment->count()}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="flex items-center justify-center h-56 pb-10">
                            <h3>No Posts Yet</h3>
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    </section>
@endsection
