<x-layouts.app xmlns:flux="http://www.w3.org/1999/html">

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @endpush


    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.posts.index')">
            Categorías
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>



    <div class="card mt-5">

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf

            <flux:input class="mb-5" value="{{ old('title') }}" type="text" name="title" placeholder="Ingresa el título de la publicación" label="Título" onInput="string_to_slug(this.value, '#slug')" />
            <flux:input class="mb-5" value="{{ old('slug') }}" type="text" id="slug" name="slug" placeholder="slug autogenerado" label="Slug" />
            <flux:input class="mb-5" value="{{ old('excerpt') }}" type="text" name="excerpt" placeholder="Escribe el resumen de la publicación" label="Resumen" />

            <flux:select label="Categoría" name="categoria_id">
                @foreach($categories as $category)
                    <flux:select.option value="{{ $category->id }}" :selected="$category->id == old('category_id')">
                        {{ $category->name }}
                    </flux:select.option>
                @endforeach
            </flux:select>


            {{--<flux:text class="mb-5" id="editor" name="content" label="Contenido de la publicación"></flux:text>--}}

            <div class="mt-5">
                <p class="font-medium text-sm mb-1">Contenido de la publicación</p>
                <div id="editor"></div>
            </div>


            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>


        </form>


    </div>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });
        </script>
    @endpush



</x-layouts.app>
