<!doctype html>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
   
    <head>
        <title>Posts</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @vite('resources/css/app.css')
    </head>
<html>
<body class="bg-slate-700 font-sans leading-normal tracking-normal">
    <!-- create a nice looking blog post with the post and the comments to the side -->
    <div class="flex flex-col md:flex-row justify-center bg-gray-700 h-fit">
        <!-- post -->
        <div class="w-full md:w-3/5 bg-gray-700 mx-2 md:mx-0 mt-6 border-black ">
            <!-- post title -->
            <div class="bg-gray-800 w-full p-4 border-black rounded-lg">
                <div class="text-3xl font-bold text-white">
                    Title: {{ $post->title }}
                </div>
                <div class="text-sm font-bold text-yellow-500">
                    Posted by 
                    <a href="{{ route('profile', $post->user->id) }}" class = "hover:text-yellow-700">
                    {{ $post->user->name }} 
                    </a>
                    on {{ $post->created_at->format('d/m/Y') }}
                </div>
            </div>
            <!-- post body -->
            <div class="bg-white w-full p-4 my-5 border-black rounded-md justify-center">
                <div class="text-xl text-black">
                    {{ $post->body }}
                </div>
            </div>
            <!-- post comments -->
            @include('layouts.comments')
            
</body>

</x-app-layout>
</html>