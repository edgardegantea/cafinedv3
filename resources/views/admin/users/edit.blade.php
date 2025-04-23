<x-layouts.app xmlns:flux="http://www.w3.org/1999/html">

    @push('css')
        {{-- You can add CSS specific to this page here --}}
    @endpush


    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.users.index')">
            Usuarios
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <div class="card mt-5">

        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">


            @csrf
            @method('PUT')


            <div class="mb-5 relative">
                <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $user->image_path ? Storage::url($user->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}" alt="{{ $user->name }}">
                <div class="absolute top-8 right-8">
                    <label class="bg-white dark:text-black px-4 py-2 border-2 rounded-lg cursor-pointer">
                        Cambiar imagen
                        <input type="file" class="hidden" name="image" accept="image/*" onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>
            </div>


            <flux:input class="mb-5" value="{{ old('name', $user->name) }}" type="text" name="name" placeholder="Nombre completo" label="Nombre" />

            <flux:input class="mb-5" value="{{ old('email', $user->email) }}" type="email" name="email" placeholder="Correo electrónico" label="Correo electrónico" />


            <flux:input class="mb-5" type="password" name="password" placeholder="Dejar vacío en caso de que no deseé modificar la contraseña" label="Contraseña" />

            <flux:input class="mb-5" type="password" name="password_confirmation" placeholder="Confirmar contraseña" label="Confirmar Contraseña" />


            <flux:textarea class="mb-5" name="bio" placeholder="Información biográfica del usuario" label="Bio">{{ old('bio', $user->bio) }}</flux:textarea>


            <flux:select class="mb-5" label="Rol dentro del sistema" name="role">
                @php
                    $roles = ['admin', 'estudiante', 'docente', 'usuario'];
                @endphp
                @foreach($roles as $roleValue)
                    <flux:select.option value="{{ $roleValue }}" :selected="$roleValue == old('role', $user->role ?? 'usuario')">
                        {{ ucfirst($roleValue) }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            <flux:select class="mb-5" label="¿Tiene alguna función dentro de cafined?" name="type">
                @php
                    $types = ['lider', 'colaborador', 'tesista', 'serviciosocial', 'no'];
                @endphp
                @foreach($types as $typeValue)
                    <flux:select.option value="{{ $typeValue }}" :selected="$typeValue == old('type', $user->type ?? 'no')">
                        {{ ucfirst($typeValue) }}
                    </flux:select.option>
                @endforeach
            </flux:select>


            <div class="flex space-x-3 mt-5">
                <p class="text-sm font-medium">Estado del usuario en el sistema: </p>
                <label class="flex items-center">
                    <input type="radio" name="active" id="active_1" value="1" @checked(old('active', $user->active) == 1)>
                    <span class="ml-1">Activo</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="active" id="active_0" value="0" @checked(old('active', $user->active) == 0)>
                    <span class="ml-1">Inactivo</span>
                </label>
            </div>


            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Actualizar</flux:button>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            function previewImage(event, selector) {
                const imageFiles = event.target.files;
                const imagePreview = document.querySelector(selector);

                if (imageFiles && imageFiles[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                    }

                    reader.readAsDataURL(imageFiles[0]);
                }
            }
        </script>
    @endpush

</x-layouts.app>
