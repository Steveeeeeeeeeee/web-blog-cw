<!DOCTYPE html>

<head>
    @vite('resources/css/app.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- use style.css -->
    <link rel="stylesheet" href="css/app.css">
    <!-- Styles -->
    <style>
    {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Lexend', sans-serif;
    }
    </style>

    <title></title>
</head>

<body class="">
    <header class="flex justify-between items-center py-8 px-[10%] bg-gray-200 shadow-outline">
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </a>
        </div>
        <nav>
            <ul class="list-none grid relative gap-5 grid-cols-2 rounded-full transition-all">
                <a href="/"
                    class="flex pt-0 px-5 relative items-center justify-center rounded-full text-gray-500 bg-gray-200 w-40 h-10 shadow-outline hover:shadow-outlineHover hover:text-red-500">
                    Home
                </a>
                <a href="/posts"
                    class="flex pt-0 px-5 relative items-center justify-center rounded-full text-gray-500 bg-gray-200 w-40 h-10 shadow-outline hover:shadow-outlineHover hover:text-red-500">
                    Posts
                </a>
            </ul>
        </nav>
        <a href="{{ route('posts') }}"
            class="relative flex items-center justify-center rounded-full text-gray-500 bg-gray-200 w-40 h-10 shadow-outline hover:shadow-outlineHover hover:text-red-500">
            <ion-icon name="person-outline"></ion-icon>
            Profile
        </a>
    </header>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>