<x-layouts.app xmlns:flux="http://www.w3.org/1999/html">

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @endpush


    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.posts.index')">
            Publicaciones
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <div class="card mt-5">

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">


            @csrf
            @method('PUT')


            <div class="mb-5 relative">



                <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}">
                <div class="absolute top-8 right-8">
                    <label class="bg-white dark:text-black px-4 py-2 border-2 rounded-lg cursor-pointer">
                        Cambiar imagen
                        <input type="file" class="hidden" name="image" accept="image/*" onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>
            </div>


            <flux:input class="mb-5" value="{{ old('title', $post->title) }}" type="text" name="title" placeholder="Ingresa el título de la publicación" label="Título" onInput="string_to_slug(this.value, '#slug')" />
            <flux:input class="mb-5" value="{{ old('slug', $post->slug) }}" type="text" id="slug" name="slug" placeholder="slug autogenerado" label="Slug" />

            <flux:select class="mb-5" label="Categoría" name="category_id">
                @foreach($categories as $category)
                    <flux:select.option value="{{ $category->id }}" :selected="$category->id == old('category_id', $post->category_id)">
                        {{ $category->name }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            <flux:textarea class="mb-5" label="Resumen" name="excerpt" rows="2">{{ old('excerpt', $post->excerpt) }}</flux:textarea>
            {{-- <flux:textarea class="mb-5" label="Contenido de la publicación" name="content" rows="10">{{ old('content', $post->content) }}</flux:textarea> --}}


            <div>
                <p class="font-medium text-sm mb-1">Contenido</p>
                <div id="editor" class="w-full">{!! old('content', $post->content) !!}</div>
                <textarea class="w-full hidden" name="content" id="content" rows="10">{{ old('content', $post->content) }}</textarea>
            </div>


            <div>
                <p class="text-sm font-medium mb-1">Etiquetas</p>

                <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-1">
                    @foreach($tags as $tag)
                        <label class="flex items-center space-x-2">
                            <input
                                type="checkbox"
                                name="tags[]"
                                value="{{ $tag->id }}" id=""
                                @checked(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())))
                            >
                            <span>{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>

            </div>


            <div class="flex space-x-3 mt-5">
                <p class="text-sm font-medium">Estado de la publicación: </p>
                <label class="flex items-center">
                    <input type="radio" name="is_published" id="" value="1" @checked(old('is_published', $post->is_published) == 1)>
                    <span class="ml-1">Publicado</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="is_published" id="" value="0" @checked(old('is_published', $post->is_published) == 0)>
                    <span class="ml-1">No publicado</span>
                </label>
            </div>

            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Actualizar</flux:button>
            </div>
        </form>
    </div>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });

            quill.on('text-change', function () {
                document.querySelector('#content').value = quill.root.innerHTML
            });
        </script>
    @endpush

</x-layouts.app>
