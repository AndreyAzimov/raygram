<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
@endif

<!-- Fonts -->
    <link rel="stylesheet"
          href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet"
          href="{{ mix('css/app.css') }}">

    <livewire:styles/>

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

</head>

<body>
<header class="fixed top-0 w-full z-30 border-b border-gray-200">
    @auth()
        <x-header-auth></x-header-auth>
    @else
        <x-header></x-header>
    @endauth
</header>

<main>
    @yield('content')
</main>

<footer>
</footer>
<x-flash.toast/>

@if(!request()->routeIs('post.create'))
    <a href="{{route('post.create')}}"
       class="fixed bottom-0 right-0 mb-1/12 mr-1/12">
        <div class="w-12 h-12 bg-indigo-600 rounded-full hover:bg-indigo-700 shadow-lg transition ease-in duration-200 focus:outline-none flex items-center justify-center">
            <svg viewBox="0 0 20 20"
                 enable-background="new 0 0 20 20"
                 class="w-6 h-6 inline-block">
                <path fill="#FFFFFF"
                      d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601 C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399 C15.952,9,16,9.447,16,10z">
                </path>
            </svg>
        </div>
    </a>
@endif


<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<livewire:scripts/>
<script>
    $("#toast").delay(3000).slideUp(200).fadeOut(500);
</script>
@yield('scripts')
</body>
</html>
