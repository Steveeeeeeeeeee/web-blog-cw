<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-zinc-600">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-slate-600 border-b border-gray-200">
                    <!--return post with ID -->
                    <div class="p-6 sm:px-20 bg-slate-600 border-b border-gray-200">
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
                   
                    <!-- show comments and indent the comment from the user name-->
                    <div class="p-6 sm:px-20 bg-slate-600 border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Comments
                        </div>
                        <div class="mt-6 text-gray-500">
                            <!-- add an edit & delete button if the comment is the users -->
                            @foreach($post->comments as $comment)
                                <div class="mt-6 text-gray-500">
                                    <div class="mt-6 text-gray-500">
                                        {{ $comment->body }}
                                    </div>
                                    <div class="mt-6 text-gray-500">
                                        {{ $comment->user->name }}
                                    </div>
                                    @if($comment->user_id == Auth::user()->id)
                                        <div class="mt-6 text-gray-500">
                                            <!-- edit button opens a text box -->
                                            <a href="{{ route('comment.edit', $comment->id) }}">Edit</a>
                                            


                                        </div>
                                        <div class="mt-6 text-gray-500">
                                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                         >
                            @endforeach
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
                
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>