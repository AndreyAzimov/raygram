<div class="flex space-x-5 md:space-x-10 justify-evenly md:justify-start md:px-4 pb-0 pt-2 md:pt-2 md:pb-2  border-t md:border-none">
    <div class="text-gray-500 md:text-gray-800 text-sm md:text-base text-center md:flex leading-tight md:leading-normal">
        <div class="text-sm md:text-base font-medium text-gray-900 md:mr-2">{{ $user->post->count() }}</div>
        {{$user->post->count() > 1 ? 'posts' : 'post'}}
    </div>
    <div class="text-gray-500 md:text-gray-800 text-sm md:text-base text-center md:flex leading-tight md:leading-normal">
        <div class="text-sm md:text-base font-medium text-gray-900 md:mr-2">{{ $user->followerCount() }}</div> {{ $user->followerCount() > 1 ? 'followers' : 'follower' }}
    </div>
    <div class="text-gray-500 md:text-gray-800 text-sm md:text-base text-center md:flex leading-tight md:leading-normal">
        <div class="text-sm md:text-base font-medium text-gray-900 md:mr-2">{{ $user->followingCount() }}</div>
        {{ 'following' }}
    </div>
</div>
