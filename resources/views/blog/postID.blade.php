<!doctype html>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <head>
        <title>Posts</title>
        @vite('resources/css/app.css')
    </head>
<body class="bg-slate-200 font-sans leading-normal tracking-normal">
    <!-- create a nice looking blog post with the post and the comments to the side -->
    <div class="flex flex-col md:flex-row">
        <!-- post -->
        <div class="w-full md:w-3/5 bg-white mx-2 md:mx-0">
            <!-- post title -->
            <div class="bg-white w-full p-4">
                <div class="text-3xl font-bold text-gray-800">
                    {{ $post->title }}
                </div>
                <div class="text-sm font-bold text-gray-600">
                    Posted by {{ $post->user->name }}
                </div>
            </div>
            <!-- post body -->
            <div class="bg-white w-full p-4">
                <div class="text-xl text-gray-800">
                    {{ $post->body }}
                </div>
            </div>
            <!-- post comments -->
            <div class="bg-white w-full p-4">
                <div class="text-2xl font-bold text-gray-800">
                    Comments
                </div>
                @foreach($post->comments as $comment)
                <div class="flex flex-col md:flex-row border-2 border-gray-200 rounded-lg p-4 my-2">
                    <div class="flex-1">
                        <div class="text-lg font-bold text-gray-800">
                            {{ $comment->user->name }}
                        </div>
                        <div class="text-gray-700">
                            {{ $comment->body }}
                        </div>
                    </div>
                    <div class="flex-1 text-right">
                        <div class="text-sm font-bold text-gray-600">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                        @if($comment->user_id == Auth::user()->id)
                        <div class="flex flex-row-reverse">
                            <a href="{{ route('comment.edit', $comment->id) }}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                            </a>
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <!-- add comment form -->
            <div class="bg-white w-full p-4">
                <div class="text-2xl font-bold text-gray-800">
                    Add Comment
                </div>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex-1">
                            <textarea name="body" class="w-full p-4 border-2 border-gray-200 rounded-lg" placeholder="Comment"></textarea>
                        </div>
                        <div class="flex-1 bg-black text-black">
                            <button type="submit" class="w-full p-4 bg-blue-500 hover:bg-blue-700 text-black font-bold rounded-lg">
                                Add Comment
                            </button>
                        </div>
                    </div>
            </form>
</body>
</x-app-layout>
  

        



        <!-- create a column for the posts -->
    