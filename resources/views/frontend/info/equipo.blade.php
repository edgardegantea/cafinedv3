<x-layouts.public.public>




    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Nuestro equipo</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Cada miembro de nuestro equipo aporta algo especial.</p>
        </div>
    </section>




    <div class="container py-10 flex items-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            @foreach($equipo as $integrante)
                @if($integrante->type == 'lider')
                    <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                        @if($integrante->image_path)
                            <img src="{{ $integrante->image_path ? Storage::url($integrante->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $integrante->title }}" class="w-full h-70 object-cover">
                        @endif
                        <div class="p-4 text-center">
                            <h2 class="text-xl font-semibold mb-2 text-black hover:text-blue-500 transition-colors duration-300">{{ $integrante->name }}</h2>
                            <p class="text-gray-700">{{ $integrante->email }}</p>
                            <p class="text-black uppercase">{{ $integrante->type }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>





    <div class="container mx-auto py-10 justify-center">
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-5 gap-4 justify-items-center">

            @foreach($equipo as $integrante)
                @if($integrante->type == 'colaborador')
                <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                    @if($integrante->image_path)
                        <img src="{{ $integrante->image_path ? Storage::url($integrante->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $integrante->title }}" class="w-full h-70 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2 text-black hover:text-blue-500 transition-colors duration-300">{{ $integrante->name }}</h2>
                        <p class="text-gray-700">{{ $integrante->email }}</p>
                        <p class="text-black uppercase">{{ $integrante->type }}</p>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
    </div>


    <div class="container mx-auto py-10 justify-center">
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-5 gap-4 justify-items-center">

            @foreach($equipo as $integrante)
                @if($integrante->type == 'tesista')
                    <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                        @if($integrante->image_path)
                            <img src="{{ $integrante->image_path ? Storage::url($integrante->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $integrante->title }}" class="w-full h-70 object-cover">
                        @endif
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2 text-black hover:text-blue-500 transition-colors duration-300">{{ $integrante->name }}</h2>
                            <p class="text-gray-700">{{ $integrante->email }}</p>
                            <p class="text-black uppercase">{{ $integrante->type }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>


    <div class="container mx-auto py-10 justify-center">
        <div class="grid grid-cols-3 md:grid-cols-5 gap-4 justify-items-center">

            @foreach($equipo as $integrante)
                @if($integrante->type == 'serviciosocial')
                    <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden my-5 mx-5 shadow-zinc-300 shadow-xl/30 block hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                        @if($integrante->image_path)
                            <img src="{{ $integrante->image_path ? Storage::url($integrante->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $integrante->title }}" class="w-full h-70 object-cover">
                        @endif
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2 text-black hover:text-blue-500 transition-colors duration-300">{{ $integrante->name }}</h2>
                            <p class="text-gray-700">{{ $integrante->email }}</p>
                            <p class="text-black uppercase">{{ $integrante->type }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>




</x-layouts.public.public>
