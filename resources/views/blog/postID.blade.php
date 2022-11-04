<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--return post with ID -->
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            {{ $post->title }}
                        </div>
                        <div class="mt-6 text-gray-500">
                            {{ $post->body }}
                        </div>
                        <div class="mt-6 text-gray-500">
                            {{ $post->user->name }}
                        </div>
                    </div>
                    <!-- add comment form -->
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Add Comment
                        </div>
                        <div class="mt-6 text-gray-500">
                            <form method="POST" action="{{ route('comment.store') }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <textarea name="body" cols="30" rows="10"></textarea>
                                <button type="submit">Add Comment</button>
                            </form>
                        </div>
                    </div>
                    <!-- show comments -->
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Comments
                        </div>
                        @foreach($post->comments as $comment)
                        <div class="mt-6 text-gray-500">
                            {{ $comment->body }}
                        </div>
                        <div class="mt-6 text-gray-500">
                            {{ $comment->user->name }}
                        </div>
                        @endforeach
                    </div>
                
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>