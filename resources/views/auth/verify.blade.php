@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="relative">
                <x-logo class="mx-auto h-12 w-auto text-indigo-700"></x-logo>
                <h2 class="mt-2 md:mt-6 text-center text-lg font-normal md:text-2xl leading-9 md:font-normal text-gray-900">
                    Email Verification.
                </h2>
                <p class="mt-2 text-center text-sm md:text-lg leading-6 text-gray-700">
                    <span class="text-gray-800 font-semibold">{{ auth()->user()->name.',' }}</span>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('You know the drill, just to make sure you own that email.') }}
                    {{ __('If you did not receive the email') }},
                </p>
                <form class="text-center mt-3" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                            class="text-sm md:text-lg text-center text-indigo-600 hover:text-indigo-500">
                        {{ __('Click here to request another') }}
                    </button>.
                </form>
            </div>
        </div>
    </div>
    <x-flash.toast></x-flash.toast>
@endsection
