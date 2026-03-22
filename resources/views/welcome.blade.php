{{-- filepath: /notes.index/criscarlo/litenotes/resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 min-h-screen bg-[#ececec] text-[#6b6b6b]">
    @if (Route::has('login'))
        <div class="w-full flex justify-end px-8 pt-4 text-[15px] leading-none">
            @auth
                <a href="{{ url('/notes.index') }}" class="underline hover:no-underline">Notes</a>
            @else
                <a href="{{ route('login') }}" class="underline hover:no-underline">Log in</a>

                @if (Route::has('register'))
                    <span class="mx-4"></span>
                    <a href="{{ route('register') }}" class="underline hover:no-underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <main class="min-h-[calc(100vh-40px)] grid place-items-center">

        <h1 class="text-5xl">LiteNotes</h1>

    </main>

</body>
</html>