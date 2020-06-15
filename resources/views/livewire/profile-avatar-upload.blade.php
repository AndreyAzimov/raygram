<div>
    <div class="relative mb-2">
        <p class="mb-3 text-xs font-normal text-gray-700">Profile Picture</p>
        <div class="flex items-center justify-start space-x-4">

            <div class="relative rounded-full overflow-hidden">
                <img src="{{!$avatar ? asset('storage/'.$user->profile->avatar) : $avatar->temporaryUrl() }}"
                     class="w-20 h-20 sm:w-28 sm:h-28 md:w-36 md:h-36 rounded-full border @error('avatar') border-red-600 @enderror object-cover"
                     alt="">
                <div class="absolute top-0 right-0 inset-0 w-full h-full"
                     wire:loading>
                    <div class="bg-filter h-full w-full flex items-center justify-center">
                        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-7 w-7"></div>
                    </div>
                </div>
            </div>

            @if($avatar)
                <div wire:click="clear"
                     wire:loading.remove
                     class="flex space-x-2 items-center px-3 py-2 bg-red-100 text-red-600 rounded-lg shadow-sm tracking-wide border border-red-400 cursor-pointer hover:bg-red-300 focus:outline-none hover:text-red-800 transition ease-in-out duration-300">
                    <svg class="w-4 h-4"
                         fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span class="text-sm leading-tight tracking-tight hidden md:block">
                    Clear
                </span>
                </div>
            @endif

            <label wire:loading.remove
                   class="{{$avatar ? 'hidden' : ''}} flex space-x-2 items-center px-3 py-2 bg-white text-gray-600 rounded-lg shadow-sm tracking-wide border border-gray-400 cursor-pointer hover:bg-gray-200  transition ease-in-out duration-300">
                <svg class="=w-4 h-4"
                     fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     stroke-width="3"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="text-sm leading-tight tracking-tight hidden md:block">
                        Upload
                    </span>
                <input id="avatar"
                       type='file'
                       name="avatar"
                       class="hidden"
                       wire:model="avatar"/>
            </label>
        </div>
    </div>

    @error('avatar')
    <span class="text-xs text-red-600">{{$message}}</span>
    @enderror
</div>
