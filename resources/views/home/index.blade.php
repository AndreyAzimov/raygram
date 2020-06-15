@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <section class="bg-gray-50">
        <div class="container mx-auto min-h-screen  flex justify-center lg:justify-between max-w-5xl mx-auto px-0 sm:px-6 lg:px-8">
            <div class="md:max-w-xl mt-2 sm:mt-10 md:mt-16 py-10 md:max-h-screen md:overflow-y-scroll hidden-scroll">
                <div class="">
                    @foreach($posts as $post)
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
                    @endforeach
                </div>
            </div>
            <div class="mt-16 py-16 pl-8 w-80 hidden lg:block max-h-screen overflow-hidden">
                <x-home.sidebar/>
            </div>
        </div>
    </section>
@endsection
