<div class="">
    <p wire:loading.remove wire:click="toggleFollowUnfollow" class="text-sm font-medium text-indigo-700 cursor-pointer">{{ $status }}</p>
    <div wire:loading>
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-7 w-7"></div>
    </div>
</div>
