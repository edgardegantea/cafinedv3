<x-layouts.app xmlns:flux="http://www.w3.org/1999/html">

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Actividades
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <div class="mt-3 flex justify-end">
        <a href="{{ route('admin.activities.create') }}">
            <flux:button variant="primary" class="cursor-pointer" icon="plus">
                Nueva actividad
            </flux:button>
        </a>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-700 dark:bg-gray-900 dark:text-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    actividad
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>


            @foreach($activities as $activity)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $activity->id }}
                    </th>
                    <td class="px-6 py-4">
                        <flux:heading>{{ $activity->name }}</flux:heading>
                        <flux:text variant="subtle" class="mt-2">{{ $activity->excerpt }}</flux:text>

                            <?php
                            $startTime = \Carbon\Carbon::parse($activity->start_time);
                            $endTime = \Carbon\Carbon::parse($activity->end_time);
                            setlocale(LC_TIME, 'es_MX.utf-8');
                            ?>

                        <flux:text><flux:badge color="orange" class="">{{ $activity->type }}</flux:badge> | Duración: {{ $activity->duration }} horas |
                            Del {{ $startTime->translatedFormat('j \\de F \\de Y \\a \\l\\a\\s h:i a') }}
                            al {{ $endTime->translatedFormat('j \\de F \\de Y \\a \\l\\a\\s h:i a') }}
                        </flux:text>
                    </td>
                    <td class="px-6 py-4">

                        <flux:button.group>
                            <a href=""><flux:button class="cursor-pointer" icon="eye"></flux:button></a>
                            <a href="{{ route('admin.activities.edit', $activity) }}"><flux:button class="cursor-pointer" icon="pencil"></flux:button></a>

                            <form class="delete-form" action="{{ route('admin.activities.destroy', $activity) }}" method="activity">
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
            {{ $activities->links() }}
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
