@extends('layouts.app')

@section('title')

    {{$post->user->name."'s post"}}

@endsection

@section('content')
    <section class="pt-10 md:pt-16 gray">
        <div class="container max-w-5xl mx-auto md:px-6 lg:px-8 md:pt-8">
            <div class="hidden md:block">
                <div class="flex space-x-6 justify-between">
                    <div class="w-8/12">
                        <img src="{{ asset('storage/'.$post->image) }}"
                             class=""
                             alt="">
                    </div>
                    <div class="flex-1 pt-4 relative">
                        <div class="flex items-center justify-start space-x-4 w-full border-b pb-3">
                            <a href="{{ route('profile.show', $post->user->username) }}">
                                <img src="{{asset($post->user->profile->avatar) }}"
                                     class="w-14 h-14 object-cover rounded-full p-1 border"
                                     alt="">
                            </a>
                            <div class="flex-1 flex justify-between">
                                <div class="text-left">
                                    <a href="{{ route('profile.show', $post->user->username) }}">
                                        <h2 class="font-medium leading-tight">{{ $post->user->name }}</h2>
                                    </a>
                                    <a href="{{ route('profile.show', $post->user->username) }}">
                                        <p class="text-sm text-gray-500 leading-tight">{{ $post->user->username }}</p>
                                    </a>
                                </div>
                                @cannot('update', $post->user->profile)
                                    <livewire:follow-from-post-show :user="$post->user"/>
                                @endcannot
                            </div>
                        </div>
                        <div class="pt-4 space-y-5 text-left pb-4 border-b">
                            <div class="space-x-4">
                                <p class="text-gray-500 text-xs font-medium leading-7">Caption:</p>
                                <h2 class="text-gray-800 mb-2 tracking-wide">{{ $post->caption }}</h2>
                            </div>
                            <div class="space-x-4 ">
                                <p class="text-gray-500 text-xs font-medium leading-7">Description:</p>
                                <h2 class="text-gray-800 mb-2 text-sm tracking-wide truncate max-w-sm">{{ $post->description ?? 'N/A'}}</h2>
                            </div>
                        </div>
                        <div class="pt-2">
                            <livewire:post-action-home :post="$post"/>
                            <livewire:comments-likes :post="$post"/>
                        </div>
                        <div class="absolute bottom-0 left-0">
                            @can('create', \App\Comment::class)
                                <livewire:add-comment-to-post-from-home-page :post="$post"/>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:hidden">
                <div class="w-full sm:border border-gray-200 mb-8 sm:mb-12 md:mb-16 md:rounded-md bg-white">
                    <div class="mt-4 pt-4 sm:pt-0 w-full px-2 sm:px-4 flex justify-between pb-2">
                        <div class="flex items-center justify-start space-x-4 w-full">
                            <a href="{{ route('profile.show', $post->user->username) }}">
                                <img src="{{ asset('storage/'.$post->user->profile->avatar)}}"
                                     class="w-10 h-10 object-cover rounded-full border"
                                     alt="">
                            </a>
                            <div class="text-left">
                                <a href="{{ route('profile.show', $post->user->username) }}">
                                    <h2 class="font-medium text-sm leading-tight">{{ $post->user->name }}</h2>
                                    <h2 class="font-normal text-xs leading-tight tracking-wide text-gray-400">
                                        {{ '@'.$post->user->username }}</h2>
                                </a>
                            </div>
                        </div>
                        <livewire:post-menu :post="$post"/>
                    </div>

                    <div>
                        <p class="text-sm px-2 sm:px-4 py-3 text-gray-700">{{ $post->caption }}</p>
                    </div>

                    <x-home.image :post="$post"/>

                    <div class="mt-3 w-full pl-4 pr-4">
                        <livewire:post-action-home :post="$post"/>
                        <livewire:comments-likes :post="$post"/>
                        <p class="text-gray-500 text-xs pb-2 text-left w-full leading-tight tracking-tight">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                    @can('create', \App\Comment::class)
                        <livewire:add-comment-to-post-from-home-page :post="$post"/>
                    @endcan
                </div>
            </div>

        </div>
    </section>
@endsection
