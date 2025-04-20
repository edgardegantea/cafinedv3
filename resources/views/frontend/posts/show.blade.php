<x-layouts.public.public>
    <div class="container mx-auto py-10">

        <a href="{{ route('posts.index') }}" class="inline-block mt-8 text-blue-500 hover:text-blue-700 my-5 flex justify-end">Back to Posts</a>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($post->image_path)
                <img src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
            @endif
            <div class="p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-gray-700 leading-relaxed">{!! $post->content !!}</p>
                <p class="text-sm text-gray-500 mt-6">Published on: {{ $post->created_at->format('F j, Y') }}</p>
            </div>
        </div>

    </div>
</x-layouts.public.public>
