<div id="comments" class="bg-gray-600 w-full p-4 rounded-lg">
                <div class="text-2xl font-bold text-gray-800 border-black rounded-lg">
                    Comments: {{ $post->comments->count() }}
                </div>
                <!-- if no comments dont do anything -->
                @if($post->comments->count() > 0)
    @foreach($post->comments as $comment)
            
    
    <div class="flex flex-col md:flex-row bg-white border-2 border-slate-900 rounded-lg p-4 my-2">
            <div class="flex-1 justify-start">
                <!-- make username clickable and go to profile -->
                <a href="{{ route('profile', $comment->user->id) }}" class="text-xl font-bold text-blue-400 hover:text-blue-600">
                    {{ $comment->user->name }}
                </a>
                <div class="text-gray-700" data-attr-comment-id="{{$comment->id}}">
                    {{ $comment->body }}
                </div>
            </div>
            <div class="flex-1 text-right ">
                <div class="text-sm font-bold text-gray-600">
                    {{ $comment->created_at->diffForHumans() }}
                </div>
                @can('delete-comment', $comment)
                <div class="flex flex-row-reverse space-x-3">
                    <!-- edit button edits on current webpage -->
                    @can('edit-comment', $comment)
                    <button data-attr-comment-edit="{{$comment->id}}" onclick="showCommentForm({{ $comment->id }})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mx-2">
                        Edit
                    </button>
                    @endcan
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                        @csrf
                        
                        @method('DELETE')
                        <button data-attr-comment-delete="{{$comment->id}}"  type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
                @endcan
            </div>
        </div>
    @endforeach
@else
    <!-- display a message if there are no comments -->
    <div class="bg-gray-600 w-full p-4 rounded-lg">
        <div class="text-2xl font-bold text-gray-800 border-black rounded-lg">
            No comments yet
        </div>
    </div>
@endif
            </div>
            <!-- add comment form -->
            <div class="bg-white w-5/6 p-4 rounded-lg mt-2 justify-center">
                <div class="text-2xl ml-4 font-bold text-gray-800">
                    Add Comment
                </div>
                <form id="comment-form">
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
            <script>    
            //conditional to stop the script from running if there are no comments
  function showCommentForm(commentId) {
    @if(count($post->comments) == 0)
    console.log('no comments');
    @else
    console.log('showCommentForm called with commentId:', commentId);
    //open a form to edit the comment
    const commentElement = document.querySelector(`[data-attr-comment-id="${commentId}"]`)
    console.log('commentElement:', commentElement);
    commentElement.innerHTML = ` <form method="POST" action="{{ route('comment.update', $comment->id) }}" class="bg-gray-600 w-full p-4 rounded-lg">
    @csrf
    @method('PUT')
    <div class="flex flex-col md:flex-row bg-white border-2 border-slate-900 rounded-lg p-4 my-2">
        <div class="flex-1 justify-start">
            <textarea name="body" class="form-input w-full py-2 px-3 rounded-md text-gray-700 leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300" id="body">{{ $comment->body }}</textarea>
        </div>
        <div class="flex-1 text-right ">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Save
            </button>
        </div>
    </div>
</form>`
    const editButton = document.querySelector(`[data-attr-comment-edit="${commentId}"]`)
    editButton.remove();
    const deleteButton = document.querySelector(`[data-attr-comment-delete="${commentId}"]`)
    deleteButton.remove();  
    @endif
  }
</script>
<script>
$(document).ready(function() {
    $('#comment-form').on('submit', function(e) {
        e.preventDefault();
        // use ajax to submit the form and update the page without refreshing
        $.ajax({
            url: "{{ route('comment.store') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                var comment = response.comment; 
                // add the new comment to the page
                $('#comment-form').trigger('reset');
            
              $('#comments').append('<div class="flex flex-col md:flex-row bg-white border-2 border-slate-900 rounded-lg p-4 my-2">' +
                        '<div class="flex-1 justify-start">' +
                        // get the user name from the comment object


                            '<a href="' + comment.user.name + '" class="text-xl font-bold text-blue-400 hover:text-blue-600">' + comment.user.name + '</a>' +
                            '<div class="text-gray-700" data-attr-comment-id="' + comment.id + '">' + comment.body + '</div>' +
                        '</div>' +
                        '<div class="flex-1 text-right ">' +
                            '<div class="text-sm font-bold text-gray-600">' + comment.created_at.toString().substring(0, comment.created_at.toString().indexOf('.')) + '</div>' +
                            // check if the user is the owner of the comment    
                            '@if(Auth::user()->id ==' + comment.user.id + ')' +
                              
                            '<div class="flex flex-row-reverse space-x-3">' +
                                '<button data-attr-comment-edit="' + comment.id + '" onclick="showCommentForm(' + comment.id + ')" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mx-2">' +
                                    'Edit' +
                                '</button>' +'<form action="/comment/' + comment.id + '/delete" method="POST">' +
'@csrf' +
'@method('DELETE')' +
'<button data-attr-comment-delete="' + comment.id + '"  type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">' +
    'Delete' +
'</button>' +
'</form>' +
'</div>' +
'@endif' +
'</div>' +
'</div>'
                    
            
              )
            }   
        })
    });
});
</script>  