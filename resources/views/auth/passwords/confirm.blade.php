@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="relative">
                <h2 class="mt-2 md:mt-6 text-center text-lg font-normal md:text-2xl leading-9 md:font-extrabold text-gray-900">
                    Confirm password
                </h2>
                <p class="text-center text-sm leading-6 text-gray-700">
                    {{ __('Please confirm your password before proceeding') }}
                </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="mt-4">
                            <input aria-label="Password"
                                   name="password"
                                   type="password"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('password'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 relative"
                                   placeholder="Enter password"/>
                            @error('password')
                            <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>


                        <div class="mt-6">
                            <button type="submit"
                                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <x-flash.toast></x-flash.toast>
@endsection
