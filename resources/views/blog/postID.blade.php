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
                
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>