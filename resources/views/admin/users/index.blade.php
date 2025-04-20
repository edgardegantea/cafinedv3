<x-layouts.app xmlns:flux="http://www.w3.org/1999/html">

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Usuarios
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <div class="mt-3 flex justify-end">
        <a href="{{ route('admin.users.create') }}">
            <flux:button variant="primary" class="cursor-pointer" icon="plus">
                Nuevo usuario
            </flux:button>
        </a>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Etiqueta
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>


            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">

                        <flux:button.group>
                            <a class="cursor-pointer" href=""><flux:button class="cursor-pointer" icon="eye"></flux:button></a>
                            <a href="{{ route('admin.users.edit', $user) }}"><flux:button class="cursor-pointer" icon="pencil"></flux:button></a>

                            <form class="delete-form" action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <flux:button type="submit" icon="trash" class="btnRojo cursor-pointer"></flux:but>
                            </form>
                        </flux:button.group>

                    </td>
                </tr>
            @endforeach



            </tbody>
        </table>


        <div class="mt-2 mb-2 mr-2 ml-2">
            {{ $users->links() }}
        </div>

    </div>


    @push('js')
        <script>
            forms = document.querySelectorAll('.delete-form');


            forms.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    /*if(confirm('El registro se eliminará permanentemente de la base de datos ¿deseas continuar?')) {
                        form.submit();
                    }*/

                    Swal.fire({
                        title: "¿Estás seguro(a) de eliminar este registro?",
                        text: "Esta acción no se puede revertir.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });

                });
            })
        </script>
    @endpush



</x-layouts.app>
