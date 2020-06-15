@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <x-logo class="mx-auto h-12 w-auto text-indigo-700"></x-logo>
                <h2 class="mt-6 text-center text-3xl leading-9 font-normal text-gray-900">
                    Create a new account.
                </h2>
                <p class="mt-2 text-center text-sm leading-5 text-gray-600">
                    Already have an account?
                    <a href="{{route('login')}}"
                       class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        login here.
                    </a>
                </p>
            </div>
            <form class="mt-8"
                  action="{{route('register')}}"
                  method="POST">
                @csrf
                <input type="hidden"
                       name="remember"
                       value="true"/>
                <div class="">
                    <div>
                        <div class="relative">
                            <input aria-label="User Name"
                                   name="name"
                                   type="text"
                                   value="{{ old('name') }}"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('name'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5"
                                   placeholder="Name"/>
                        </div>
                        @error('name')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <div class="relative">
                            <input aria-label="User Name"
                                   name="username"
                                   type="text"
                                   value="{{ old('username') }}"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('username'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5"
                                   placeholder="Username"/>
                        </div>
                        @error('username')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <div class="relative">
                            <input aria-label="Email address"
                                   name="email"
                                   type="email"
                                   value="{{ old('email') }}"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('email'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5"
                                   placeholder="Email address"/>
                        </div>
                        @error('email')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <div class="relative">
                            <input aria-label="Password"
                                   name="password"
                                   type="password"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('password'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 relative"
                                   placeholder="Password"/>
                        </div>
                        @error('password')
                        <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <div class="relative">
                            <input aria-label="Password Confirmation"
                                   name="password_confirmation"
                                   type="password"
                                   required
                                   class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('password'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 relative"
                                   placeholder="Confirm Password"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

