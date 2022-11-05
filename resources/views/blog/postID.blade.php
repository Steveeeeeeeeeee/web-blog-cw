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
    
<body class="bg-slate-700 font-sans leading-normal tracking-normal">
    <!-- create a nice looking blog post with the post and the comments to the side -->
    <div class="flex flex-col md:flex-row justify-center bg-gray-700 h-fit">
        <!-- post -->
        <div class="w-full md:w-3/5 bg-gray-700 mx-2 md:mx-0 mt-6 border-black ">
            <!-- post title -->
            <div class="bg-gray-800 w-full p-4 border-black rounded-lg">
                <div class="text-3xl font-bold text-white">
                    {{ $post->title }}
                </div>
                <div class="text-sm font-bold text-yellow-500">
                    Posted by {{ $post->user->name }} on {{ $post->created_at->format('d/m/Y') }}
                </div>
            </div>
            <!-- post body -->
            <div class="bg-white w-full p-4 my-5 border-black rounded-md justify-center">
                <div class="text-xl text-black">
                    {{ $post->body }}
                </div>
            </div>
            <!-- post comments -->
            <div class="bg-gray-600 w-full p-4 rounded-lg">
                <div class="text-2xl font-bold text-gray-800 border-black rounded-lg">
                    Comments: {{ $post->comments->count() }}
                </div>
                @foreach($post->comments as $comment)
                <div class="flex flex-col md:flex-row bg-white border-2 border-slate-900 rounded-lg p-4 my-2">
                    <div class="flex-1">
                        <div class="text-lg font-bold text-gray-900">
                            {{ $comment->user->name }}
                        </div>
                        <div class="text-gray-700">
                            {{ $comment->body }}
                        </div>
                    </div>
                    <div class="flex-1 text-right ">
                        <div class="text-sm font-bold text-gray-600">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                        @if($comment->user_id == Auth::user()->id)
                        <div class="flex flex-row-reverse space-x-3">
                            <!-- edit button edits on current webpage -->
                            <a href="{{ route('comment.edit', $comment->id) }}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mx-2">
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
            <div class="bg-white w-5/6 p-4 rounded-lg mt-2 justify-center">
                <div class="text-2xl ml-4 font-bold text-gray-800">
                    Add Comment
                </div>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="flex flex-col md:flex-row justify-center">
                        <div class="flex-1">
                            <textarea name="body" class="w-full h-16 p-4 border-2 border-gray-200 rounded-lg" placeholder="Comment"></textarea>
                        </div>
                        <div class="flex-1 text-black">
                            <button type="submit" class="w-5/6 h-16 ml-4 p-4  bg-blue-500 hover:bg-blue-700 text-black font-bold rounded-lg">
                                Add Comment
                            </button>
                        </div>
                    </div>
            </form>
            </div>

</body>
</x-app-layout>
  

        



        <!-- create a column for the posts -->
    