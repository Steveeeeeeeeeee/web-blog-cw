<!doctype html>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ $user->name }}
           
        </h2>
    </x-slot>
   
    <head>
        <title>Posts</title>
        @vite('resources/css/app.css')
    </head>
    <body>
             <!-- show post of user -->        
            @foreach($posts as $post) 
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        <!-- href to go to post of the id -->
                        <a href="{{ route('post', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </div>
                    <div class="mt-6 text-gray-500">
                        // show first 100 characters of the post
                        {{ substr($post->body, 0, 100) }} ...
                       
                    </div>
                </div>
            
            @endforeach
                                  
    </body>
</x-app-layout> 