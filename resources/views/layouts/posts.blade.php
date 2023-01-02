

    <div class="grid xl:grid-cols-5 sm:grid-cols-1 relative gap-6 pt-8 flex-wrap justify-center place-items-center">
        @foreach($posts as $post)
              
            <div
            onclick="window.location.href='{{ route('post', $post->id) }}'"
                class="relative w-96 h-96 bg-green-200 rounded-xl rounded-b-2xl shadow-outline hover:shadow-outlineHover cursor-pointer">
                <div class="absolute h-32 px-2 w-full bottom-0 inset-x-0 bg-gray-200 rounded-b-2xl shadow-outline">
                    <a href="{{ route('post', $post->id) }}" class="">{{ $post->title }}</a>
                </div>
                <div class="absolute h-16 px-2 w-full bottom-0 inset-x-0 bg-gray-300 rounded-b-2xl shadow-outline hover:text-red-400">
                    <a href="{{ route('profile', $post->user->id) }}" class="">{{$post->user->name}}</a>
                </div>
                <div class="absolute px-2 h-8 w-full bottom-0 inset-x-0 bg-gray-400 rounded-b-2xl shadow-outline">
                    <a class="">{{$post->created_at}}</a>
                </div>
            </div>
            
        @endforeach
        <div class="fixed bottom-1/3 left-0 right-0 flex justify-center">
            {{ $posts->links() }}
</div>
    </div>