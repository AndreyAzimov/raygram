<div class="space-x-4 flex ">
    <div class="flex items-center space-x-2" wire:loading.remove>
        <button href=""
                wire:click="toggleFollowUnfollow"
                class="px-3 py-1 {{ $isFollowing ? 'bg-gray-50 text-gray-700 border-gray-500 hover:bg-gray-100' : 'bg-indigo-600 text-white border-indigo-800 hover:bg-indigo-800' }} border focus:outline-none  capitalize text-sm font-medium  rounded-md flex-shrink-0">
            {{ $status }}
        </button>
        @if($isFollowing)
            <button href=""
                    wire:click=""
                    class="px-3 py-1 bg-indigo-600 text-gray-100 border-indigo-600 hover:bg-indigo-500 border focus:outline-none  capitalize text-sm font-medium  rounded-md flex-shrink-0">
                <svg class="h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 9l-7 7-7-7"></path></svg>
            </button>
        @endif
    </div>
    <div wire:loading>
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-7 w-7"></div>
    </div>

    <x-flash.toast/>
</div>
