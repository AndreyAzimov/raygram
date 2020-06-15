@extends('layouts.app')

@section('content')
    <section class="pt-16 gray">
        <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            Create
            <div class="max-w-lg">
                <form class="pt-8"
                      action="{{route('post.update', $post->id)}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="">
                        <div>
                            <div class="relative">
                                <label for="caption"
                                       class="mb-1 text-xs font-normal text-gray-700">Caption</label>
                                <input aria-label="caption"
                                       name="caption"
                                       type="text"
                                       id="caption"
                                       value="{{ old('caption') ?? $post->caption}}"
                                       required
                                       class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('caption'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 text-sm sm:leading-5"/>
                            </div>
                            @error('caption')
                            <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <label for="description"
                                       class="mb-1 text-xs font-normal text-gray-700">Description</label>
                                <textarea aria-label="description"
                                          name="description"
                                          type="text"
                                          id="description"
                                          class="focus:outline-none h-32 appearance-none resize-none appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 @error('description'){{'border-red-500'}}@enderror placeholder-gray-500 text-gray-900  focus:outline-none focus:shadow-outline-blue focus:border-indigo-500 focus:z-10 sm:text-sm sm:leading-5 text-sm">{{ old('description') ?? $post->description}}</textarea>
                            </div>
                            @error('description')
                            <span class="pl-2 text-xs text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
