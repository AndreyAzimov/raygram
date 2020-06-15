<div class="flex items-center justify-start space-x-4 w-full pb-4 pl-2 flex-shrink-0">
    <a href="{{ route('profile.show', auth()->user()->username) }}">
        <img src="{{ asset('storage/'.auth()->user()->profile->avatar)}}"
             class="w-16 h-16 object-cover rounded-full border"
             alt="">
    </a>
    <div class="text-left">
        <a href="{{ route('profile.show', auth()->user()->username) }}">
            <h2 class="font-medium text-sm leading-tight pb-1">{{ auth()->user()->name }}</h2>
        </a>
        <a href="{{ route('profile.show', auth()->user()->username) }}">
            <h2 class="font-normal text-xs leading-tight tracking-wide text-gray-500">{{ auth()->user()->username }}</h2>
        </a>
    </div>
</div>
<div class="flex justify-between pb-4 items-baseline">
    <p class="text-gray-600 text-sm font-medium tracking-wide capitalize">Suggestions for you</p>
    <a href="#" class="text-xs font-medium capitalize focus:outline-none">See all</a>
</div>
<div class="pl-2">
    <div class="flex justify-between pb-2 items-center">
        <div class="flex items-center justify-start space-x-4">
            <a href="{{ route('profile.show', auth()->user()->username) }}">
                <img src="{{ asset('storage/'.auth()->user()->profile->avatar)}}"
                     class="w-10 h-10 object-cover p-0.5 border-orange-700 rounded-full border-2"
                     alt="">
            </a>
            <div class="text-left">
                <a href="{{ route('profile.show', auth()->user()->username) }}">
                    <h2 class="font-medium text-sm leading-tight">{{ auth()->user()->username }}</h2>
                </a>
                <a href="{{ route('profile.show', auth()->user()->username) }}">
                    <h2 class="font-normal text-xs leading-tight tracking-wide text-gray-500">{{ 'Follows you' }}</h2>
                </a>
            </div>
        </div>
        <div class="">
            <a href="#" class="text-xs font-medium text-indigo-700 capitalize focus:outline-none">Follow</a>
        </div>
    </div>
</div>
