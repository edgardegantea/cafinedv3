<x-layouts.app>

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('categories.index')">
            Categorías
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>





    <div class="card mt-5">

        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            <flux:input label="Categoría" name="name" description="Ingrese el nombre de la categoría" value="{{ old('name') }}"></flux:input>

            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>


        </form>


    </div>



</x-layouts.app>
