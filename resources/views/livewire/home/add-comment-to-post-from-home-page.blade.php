<div>
    <form action=""
          wire:submit.prevent="addComment"
          class="sm:border-t border-gray-100 px-4 py-3 flex w-full justify-center items-center">
        <label for="comment" class="hidden"></label>
        <input wire:model.debouce.500ms="comment"
               class="flex-1 text-sm text-gray-600 focus:outline-none @error('comment') w-96 border-b border-red-400 @enderror"
               name="comment"
               id="comment"
               type="text"
               autocomplete="off"
               placeholder="Add comment">
        <div class="flex items-center justify-end space-x-2">
            <button wire:loading.remove
                    class=" {{$comment == null ? 'hidden' : ''}} text-indigo-700 focus:outline-none font-medium tracking-wide">
                <svg class="h-7 w-7"
                     fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     stroke-width="2"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z">sub</path>
                </svg>
            </button>
            <div wire:loading
                 wire:target="addComment">
                <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-7 w-7"></div>
            </div>
        </div>
    </form>

    <x-flash.toast/>
</div>

