@extends('layouts.app')

@section('content')
    <section class="pt-16 gray">
        <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            Edit profile
            <div class="max-w-lg">
                <form class="pt-10"
                      action="{{route('profile.update', $user->id)}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="">

                        <livewire:profile-avatar-upload :user="$user"/>

                        <div class="mt-4">
                            <div class="relative">
                                <label for="bio"
                                       class="mb-1 text-xs font-normal text-gray-700">Bio / Description</label>
                                <textarea aria-label="Bio"
                                          id="bio"
                                          name="bio"
                                          type="text"
                                          required
                                          class=" focus:outline-none h-32 appearance-none resize-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('bio'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 text-sm leading-5"
                                          placeholder="Bio">{{ old('bio') ?? $user->profile->bio}}</textarea>
                            </div>
                            @error('bio')
                            <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <label for="url"
                                       class="mb-1 text-xs font-normal text-gray-700">Url / Website</label>
                                <input aria-label="Website"
                                       id="url"
                                       name="url"
                                       type="text"
                                       required
                                       value="{{ old('url') ?? $user->profile->url}}"
                                       class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('url'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 text-sm leading-5"
                                       placeholder="Website / URL"/>
                            </div>
                            @error('url')
                            <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <button type="submit"
                                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
