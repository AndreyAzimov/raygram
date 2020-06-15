<div class="flex justify-between">
    <div class="flex space-x-4 pb-2">
        <svg wire:click="likeToggle" class="h-7 w-7 sm:h-8 sm:w-8 cursor-pointer"
             fill="{{ !$postAlreadyLike ? 'none' : '#c111a4' }}"
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="1"
             viewBox="0 0 24 24"
             stroke="{{ !$postAlreadyLike ? 'currentColor' : '#c111a4' }}">
            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
        </svg>
        <svg class="h-7 w-7 sm:h-8 sm:w-8"
             fill="none"
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="1"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
        <svg class="h-7 w-7 sm:h-8 sm:w-8"
             fill="none"
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="1"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
        </svg>
    </div>
    <div>
        <svg class="h-7 w-7 sm:h-8 sm:w-8"
             fill="none"
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="1"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
        </svg>
    </div>
</div>
