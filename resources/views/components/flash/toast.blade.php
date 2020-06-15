<div>
    @if (session('failed'))
        <div class="fixed top-0 left-0 mt-1 right-0 z-50 flex items-center justify-center">
            <div id="toast"
                 class="text-center text-white bg-red-600  px-6 py-3 rounded-full text-sm shadow-xl">
                {{ session('failed')}}
            </div>
        </div>
        <script>
            $("#toast").delay(2400).slideUp(200).fadeOut(500);
        </script>
    @endif

    @if (session('recent'))
        <div class="fixed top-0 left-0 mt-1 right-0 z-50 flex items-center justify-center">
            <div id="toast"
                 class="text-center text-white bg-red-600  px-6 py-3 rounded-full text-sm shadow-xl">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        </div>
        <script>
            $("#toast").delay(2400).slideUp(200).fadeOut(500);
        </script>
    @endif

    @if (session('status'))
        <div class="fixed top-0 left-0 mt-1 right-0 z-50 flex items-center justify-center">
            <div id="toast"
                 class="text-center text-white bg-blue-600  px-6 py-3 rounded-full text-sm shadow-xl">
                {{ session('status')}}
            </div>
        </div>
        <script>
            $("#toast").delay(2400).slideUp(200).fadeOut(500);
        </script>
    @endif

    @if (session()->has('success'))
        <div id="toast"
             class="fixed top-0 left-0 mt-1 right-0 z-50 flex items-center justify-center">
            <div
                class="text-center text-white bg-green-600  px-6 py-3 rounded-full text-sm shadow-xl">
                {{ session('success')}}
            </div>
        </div>
        <script>
            $("#toast").delay(2400).slideUp(200).fadeOut(500);
        </script>
    @endif
</div>

