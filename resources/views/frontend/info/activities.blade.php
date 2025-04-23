<x-layouts.public.public>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Actividades académicas</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Sumérgete en nuestras Actividades Académicas, donde encontrarás talleres, cursos, conferencias y más.</p>
        </div>
    </section>



    <div class="container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($activities as $activity)
                <a href="#" class="bg-white dark:bg-white dark:text-black rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                    @if($activity->image_path)
                        <img src="{{ $activity->image_path ? Storage::url($activity->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $activity->name }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4 dark:text-black">
                        <flux:heading class="dark:text-blue-900"><flux:badge variant="solid" color="orange" class="">{{ $activity->type }}</flux:badge>{{ $activity->name }}</flux:heading>
                        <flux:text class="mt-2 dark:text-black">{{ $activity->excerpt }}</flux:text>

                            <?php
                            $startTime = \Carbon\Carbon::parse($activity->start_time);
                            $endTime = \Carbon\Carbon::parse($activity->end_time);
                            setlocale(LC_TIME, 'es_MX.utf-8');
                            ?>

                        <flux:text class="dark:text-black">Duración: {{ $activity->duration }} horas |
                            Del {{ $startTime->translatedFormat('j \\de F \\de Y \\a \\l\\a\\s h:i a') }}
                            al {{ $endTime->translatedFormat('j \\de F \\de Y \\a \\l\\a\\s h:i a') }}
                        </flux:text>
                    </div>

                    <div class="flex justify-center">
                        <flux:button icon="cursor-arrow-ripple" variant="primary"  class="my-5">
                            Inscribirme
                        </flux:button>
                    </div>


                </a>
            @endforeach



        </div>

        <flux:separator />

        <div class="justify-items-center text-black">
            {{ $activities->links() }}
        </div>



    </div>




</x-layouts.public.public>
