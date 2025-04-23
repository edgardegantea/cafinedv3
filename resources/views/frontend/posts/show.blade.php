<x-layouts.public.public>
    <div class="container mx-auto">

        <flux:breadcrumbs class="mb-5 mt-5">
            <flux:breadcrumbs.item :href="route('inicio')">
                <flux:badge variant="pill" color="zinc"><span class="dark: text-black">Dashboard</span></flux:badge>
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('posts.index')">
                <flux:badge variant="pill" color="zinc"><span class="dark: text-black">Publicaciones</span></flux:badge>
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                <flux:badge variant="pill" color="orange"><span class="dark: text-black">{{ $post->category_id.'-'.$post->id}}</span></flux:badge>
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>


        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-5">
            @if($post->image_path)
                <img src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
            @endif
            <div class="p-8">
                <flux:heading size="xl" class="dark:text-blue-900">{{ $post->title }}</flux:heading>
                <flux:badge variant="solid" color="zinc" size="xs" class="text-xs font-mono font-light mt-2 mb-2">Publicado el: {{ $post->created_at->locale('es_ES')->isoFormat('LL') }}</flux:badge>
                <flux:text class="text-gray-700">{!! $post->content !!}</flux:text>
            </div>
        </div>

    </div>
</x-layouts.public.public>
