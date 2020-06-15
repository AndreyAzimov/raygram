@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <x-logo class="mx-auto h-12 w-auto text-indigo-700"></x-logo>
                <h2 class="mt-6 text-center text-3xl leading-9 font-normal text-gray-900">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-center text-sm leading-5 text-gray-600">
                    Or
                    <a href="{{route('register')}}"
                       class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        register for free and post an ad.
                    </a>
                </p>
            </div>
            <form class="mt-8"
                  action="{{route('login')}}"
                  method="POST">
                @csrf
                <div class="">
                    <div>
                        <input aria-label="Email address"
                               name="email"
                               type="email"
                               value="{{ old('email') }}"
                               required
                               class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('email'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5"
                               placeholder="Email address"/>
                        @error('email')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input aria-label="Password"
                               name="password"
                               type="password"
                               required
                               class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('password'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 relative"
                               placeholder="Password"/>
                        @error('password')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember"
                               type="checkbox"
                               name="remember"
                               class="form-checkbox h-4 w-4 text-indigo-500 transition duration-150 ease-in-out"
                        {{old('remember') == 'on' ? 'checked' : ''}}
                        <label for="remember"
                               class="ml-2 block text-sm leading-5 text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
