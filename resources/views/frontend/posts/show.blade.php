<x-layouts.public.public>
    <div class="container mx-auto">



        <div class="mb-1 mt-3 flex justify-end">
            <flux:button
                href="{{ route('posts.index') }}"
                icon="arrow-left">
                Regresar a la sección anterior
            </flux:button>
        </div>


        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($post->image_path)
                <img src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
            @endif
            <div class="p-8">
                <h1 class="text-3xl dark:text-black font-bold">{{ $post->title }}</h1>
                <flux:badge variant="solid" color="zinc" size="xs" class="text-xs font-mono font-light mt-2 mb-2">Publicado el: {{ $post->created_at->locale('es_ES')->isoFormat('LL') }}</flux:badge>
                <p class="text-gray-700 leading-relaxed">{!! $post->content !!}</p>
            </div>
        </div>

    </div>
</x-layouts.public.public>
