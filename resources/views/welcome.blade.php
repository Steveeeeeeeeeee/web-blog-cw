<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite('resources/css/app.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stevens Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- use style.css -->
    <link rel="stylesheet" href="css/app.css">
    <!-- Styles -->
    

    <style>
    body {
        font-family: 'Lexend', sans-serif;
    }
    </style>
</head>

<body class="bg-gray-200 flex flex-col justify-center items-center min-h-screen">
    @if (Route::has('login'))
    <div class="relative justify-center pb-20 text-9xl tracking-normal font-bold text-gray-900">
        <h1>Web Blog</h1>
    </div>
    <div class="grid relative gap-5 grid-flow-col rounded-full transition-all">
        @auth
        <a href="{{ url('/dashboard') }}"
            class="relative flex items-center justify-center rounded-full text-gray-500 bg-gray-200 w-40 h-10 shadow-outline hover:shadow-outlineHover hover:text-red-500">
            Dashboard
        </a>
        @else
            
                <a href=" {{ route('login') }}"
            class="relative flex items-center justify-center rounded-full text-gray-500 bg-gray-200 w-40 h-10 shadow-outline hover:shadow-outlineHover hover:text-red-500">
            <ion-icon name="person-add-outline" class="mr-2 w-5 h-5"></ion-icon>
            Log in
        </a>
        @if (Route::has('register'))

        <a href="{{ route('register') }}"
            class="relative flex items-center justify-center rounded-full text-gray-500 bg-gray-200 w-40 h-10 shadow-outline hover:shadow-outlineHover hover:text-red-500">
            <ion-icon name="log-in-outline" class="mr-2 w-5 h-5"></ion-icon>
            Register
        </a>
        @endif
        @endauth
    </div>
    @endif
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>