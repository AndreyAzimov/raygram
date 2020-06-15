@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="relative">
                <x-logo class="mx-auto h-12 w-auto text-indigo-700"></x-logo>
                <h2 class="mt-2 md:mt-6 text-center text-lg font-normal md:text-2xl leading-9 md:font-normal text-gray-900">
                    Password Reset
                </h2>
                <form method="POST"
                      action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden"
                           name="token"
                           value="{{ $token }}">
                    <div class="mt-6">
                        <input aria-label="Email address"
                               id="email"
                               name="email"
                               type="email"
                               value="{{ $email ?? old('email') }}"
                               required
                               class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('email'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5"
                               placeholder="Registered e-mail address"/>
                    </div>
                    @error('email')
                    <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                    @enderror

                    <div class="mt-4">
                        <div class="relative">
                            <input aria-label="Password"
                                   name="password"
                                   type="password"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('password'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 relative"
                                   placeholder="New password"/>
                            @error('password')
                            <div class="w-6 h-6 absolute right-0 top-0 mt-3 mr-2 text-red-500">
                                <svg focusable="false"
                                     class="fill-current svg-inline--fa fa-info-circle fa-w-16"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                </svg>
                            </div>
                            @enderror
                        </div>
                        @error('password')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <input aria-label="Password"
                                   name="password_confirmation"
                                   type="password"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('password'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 relative"
                                   placeholder="Confirm password"/>
                        </div>
                    </div>


                    <div class="mt-6">
                        <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <x-flash.toast></x-flash.toast>
@endsection
