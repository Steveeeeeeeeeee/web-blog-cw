<!doctype html>
<html>

    <head>
        <title>Posts</title>
        @vite('resources/css/app.css')
       
    </head>
    <div class=" bg-white">
    <!-- creating a heading for the page with tailwind -->
        <div class=" mx-auto sm:px-6 lg:px-8 bg-slate-500">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-center">Posts</h1>
                    <!--return available posts -->
                    
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                            <div class="mt-8 text-2xl">
                                <!-- href to go to post of the id -->
                                <a href="{{ route('post', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </div>
                            <div class="mt-6 text-gray-500">
                                {{ $post->body }}
                            </div>
                        </div>               
                </div>
            </div>

                    <!-- show comments and indent the comment from the user name-->
                    <div class="p-6 sm:px-20 border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Comments
                        </div>
                        <div class="flex flex-col ml-10 mt-6 bg-gray-800">
                            <!-- add an edit & delete button if the comment is the users -->
                            @foreach($post->comments as $comment)                   
                                <div class="mt-6">
                                    <div class="mt-6 text-xl text-black bg-slate-400">
                                        {{ $comment->user->name }}
                                    </div>
                                    <div class="mt-6 text-white">
                                        {{ $comment->body }}
                                    </div>
                                    @if($comment->user_id == Auth::user()->id)
                                    <!-- create a flex box with two rows -->
                                        <div class="flex flex-row">
                                            <!-- edit button -->
                                            <div class="flex-1">
                                                <a href="{{ route('comment.edit', $comment->id) }}">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Edit
                                                    </button>
                                                </a>
                                            </div>
                                            <!-- delete button -->
                                            <div class="flex-1">
                                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class= "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                      
                                    @endif
                            @endforeach
                        </div>
                    
                    </div>
                     <!-- add comment form with tailwind css -->
                    <div class="p-6 sm:px-20 bg-slate-600 border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Add Comment
                        </div>
                        <div class="mt-6 ">
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <div class="mt-6">
                                    <textarea name="body" id="body" cols="30" rows="10" class="w-full"></textarea>
                                </div>
                                <div class="mt-6">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Add Comment</button>
                                </div>
                            </form>
                        </div>
                
                
                </div>
            </div>
        </div>
    </div>
</html> 