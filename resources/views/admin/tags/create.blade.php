<x-layouts.app>

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('tags.index')">
            Etiquetas
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <div class="card mt-5">
        <form action="{{ route('tags.store') }}" method="post">
            @csrf
            <flux:input label="Etiqueta" name="name" description="Ingrese el nombre de la etiqueta" value="{{ old('name') }}"></flux:input>
            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>
        </form>
    </div>

</x-layouts.app>
