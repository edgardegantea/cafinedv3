<x-layouts.public.public>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Comunicación</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">En esta sección, encontrarás las noticias más recientes y relevantes. Te mantenemos al tanto de eventos, logros, comunicados y toda la información importante que necesitas conocer. ¡No te pierdas nada!</p>
        </div>
    </section>



    <div class="container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($posts as $post)
                <a href="{{ route('posts.show', $post) }}" class="bg-white rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                    @if($post->image_path)
                        <img src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $post->title }}" class="w-full h-60 object-cover">
                    @endif
                    <div class="p-4">
                        <flux:badge variant="solid" color="zinc" size="xs" class="text-xs font-mono font-light mt-2">Publicado el: {{ $post->created_at->locale('es_ES')->isoFormat('LL') }}</flux:badge>
                        <h2 class="text-xl font-semibold mb-2 text-black hover:text-blue-500 transition-colors duration-300">{{ $post->title }}</h2>
                        <p class="text-gray-700">{{ $post->excerpt }}</p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

    <div class="mt-2 mb-2 mr-2 ml-2">
        {{ $posts->links() }}
    </div>


</x-layouts.public.public>
