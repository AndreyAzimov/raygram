@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="relative">
                <x-logo class="mx-auto h-12 w-auto text-indigo-700"></x-logo>
                <h2 class="mt-2 md:mt-6 text-center text-lg font-normal md:text-2xl leading-9 md:font-normal text-gray-900">
                    Forgot password?
                </h2>
                <p class="text-center text-sm leading-6 text-gray-700">
                    {{ __('No worries, just enter your email address below and check your inbox.') }}
                </p>
                <form method="POST"
                      action="{{ route('password.email') }}">
                    @csrf
                    <div class="relative mt-6">
                        <input aria-label="Email address"
                               name="email"
                               type="email"
                               value="{{ old('email') }}"
                               required
                               class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('email'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5"
                               placeholder="Registered e-mail address"/>
                        @error('email')
                        <div class="w-6 h-6 absolute right-0 top-0 mt-3 mr-2 text-red-500">
                            <svg fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        @enderror
                    </div>
                    @error('email')
                    <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                    @enderror

                    <div class="mt-6">
                        <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-flash.toast></x-flash.toast>
@endsection
