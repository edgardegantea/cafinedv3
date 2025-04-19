<x-layouts.app>

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('tags.index')">
            Etiquetas
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>





    <div class="card mt-5">

        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')

            <flux:input label="Etiqueta" name="name" description="Ingrese el nombre de la etiqueta" value="{{ old('name', $tag->name) }}"></flux:input>

            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Actualizar</flux:button>
            </div>


        </form>


    </div>



</x-layouts.app>
