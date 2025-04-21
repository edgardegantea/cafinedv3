<x-layouts.public.public>

    <div class="container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($posts as $post)
                <a href="{{ route('posts.show', $post) }}" class="bg-white rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                    @if($post->image_path)
                        <img src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2 text-black hover:text-blue-500 transition-colors duration-300">{{ $post->title }}</h2>
                        <p class="text-gray-700">{{ $post->excerpt }}</p>
                        <flux:badge variant="solid" color="zinc" size="xs" class="text-xs font-mono font-light mt-2">Publicado el: {{ $post->created_at->locale('es_ES')->isoFormat('LL') }}</flux:badge>
                    </div>
                </a>
            @endforeach
        </div>




    </div>

    <div class="mt-2 mb-2 mr-2 ml-2">
        {{ $posts->links() }}
    </div>


</x-layouts.public.public>
