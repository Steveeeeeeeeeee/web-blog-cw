<!-- edit a comment form -->
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Edit Comment
    </div>
    <div class="mt-6 text-gray-500">
        <form method="POST" action="{{ route('comment.update', $comment->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
            <textarea name="body" cols="30" rows="10">{{ $comment->body }}</textarea>
            <button type="submit">Update Comment</button>
        </form>
    </div>
</div>

<!-- update a comment -->



