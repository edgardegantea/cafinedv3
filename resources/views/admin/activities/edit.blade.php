<x-layouts.app xmlns:flux="http://www.w3.org/1999/html">

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @endpush

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.activities.index')">
            Actividades
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="card mt-5">
        <form action="{{ route('admin.activities.update', $activity) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5 relative">
                <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $activity->image_path ? Storage::url($activity->image_path) : 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' }}">
                <div class="absolute top-8 right-8">
                    <label class="bg-white dark:text-black px-4 py-2 border-2 rounded-lg cursor-pointer">
                        Cambiar imagen
                        <input type="file" class="hidden" name="image" accept="image/*" onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>

            </div>

            <flux:input class="mb-5" value="{{ old('name', $activity->name) }}" type="text" name="name" placeholder="Ingresa el nombre de la actividad" label="Nombre" required />

            <flux:select class="mb-5" label="Tipo" name="type">
                <flux:select.option value="taller" :selected="'taller' == old('type', $activity->type)">Taller</flux:select.option>
                <flux:select.option value="curso" :selected="'curso' == old('type', $activity->type)">Curso</flux:select.option>
                <flux:select.option value="curso-taller" :selected="'curso-taller' == old('type', $activity->type)">Curso-Taller</flux:select.option>
                <flux:select.option value="diplomado" :selected="'diplomado' == old('type', $activity->type)">Diplomado</flux:select.option>
            </flux:select>


            <flux:textarea class="mb-5" label="Resumen" name="excerpt" rows="3">{{ old('excerpt', $activity->excerpt) }}</flux:textarea>
            @error('excerpt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:textarea class="mb-5" label="Descripción" name="description" rows="3">{{ old('description', $activity->description) }}</flux:textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('start_time', $activity->start_time ? $activity->start_time->format('Y-m-d\TH:i') : '') }}" type="datetime-local" name="start_time" label="Fecha y Hora de Inicio" />
            @error('start_time')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('end_time', $activity->end_time ? $activity->end_time->format('Y-m-d\TH:i') : '') }}" type="datetime-local" name="end_time" label="Fecha y Hora de Fin" />
            @error('end_time')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('duration', $activity->duration) }}" type="number" name="duration" label="Duración (en horas, etc.)" />
            @error('duration')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('location', $activity->location) }}" type="text" name="location" label="Ubicación" />
            @error('location')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:textarea class="mb-5" label="Dirección" name="address" rows="2">{{ old('address', $activity->address) }}</flux:textarea>
            @error('address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('meeting_link', $activity->meeting_link) }}" type="url" name="meeting_link" label="Enlace de Reunión (online)" />
            @error('meeting_link')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:textarea class="mb-5" label="Materiales" name="materials" rows="2">{{ old('materials', $activity->materials) }}</flux:textarea>
            @error('materials')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:textarea class="mb-5" label="Prerrequisitos" name="prerequisites" rows="2">{{ old('prerequisites', $activity->prerequisites) }}</flux:textarea>
            @error('prerequisites')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('target_audience', $activity->target_audience) }}" type="text" name="target_audience" label="Público Objetivo" />
            @error('target_audience')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('language', $activity->language) }}" type="text" name="language" label="Idioma" />
            @error('language')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('syllabus_url', $activity->syllabus_url) }}" type="url" name="syllabus_url" label="URL del Temario" />
            @error('syllabus_url')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('contact_email', $activity->contact_email) }}" type="email" name="contact_email" label="Email de Contacto" />
            @error('contact_email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('contact_phone', $activity->contact_phone) }}" type="text" name="contact_phone" label="Teléfono de Contacto" />
            @error('contact_phone')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('qr_code_link', $activity->qr_code_link) }}" type="url" name="qr_code_link" label="Enlace/URL del Código QR" />
            @error('qr_code_link')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('capacity', $activity->capacity) }}" type="number" name="capacity" label="Capacidad" />
            @error('capacity')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('price', $activity->price) }}" type="number" step="0.01" name="price" label="Precio" />
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:textarea class="mb-5" label="Temario (para cursos/diplomados)" name="syllabus" rows="3">{{ old('syllabus', $activity->syllabus) }}</flux:textarea>
            @error('syllabus')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('modules', $activity->modules) }}" type="number" name="modules" label="Número de Módulos" />
            @error('modules')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:input class="mb-5" value="{{ old('credits', $activity->credits) }}" type="number" name="credits" label="Créditos Académicos" />
            @error('credits')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:select class="mb-5" label="Frecuencia" name="frequency">
                <flux:select.option value="" :selected="'' == old('frequency', $activity->frequency)">Seleccionar</flux:select.option>
                <flux:select.option value="unico" :selected="'unico' == old('frequency', $activity->frequency)">Único</flux:select.option>
                <flux:select.option value="semanal" :selected="'semanal' == old('frequency', $activity->frequency)">Semanal</flux:select.option>
                <flux:select.option value="mensual" :selected="'mensual' == old('frequency', $activity->frequency)">Mensual</flux:select.option>
                <flux:select.option value="otro" :selected="'otro' == old('frequency', $activity->frequency)">Otro</flux:select.option>
            </flux:select>
            @error('frequency')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:textarea class="mb-5" label="Metodología" name="methodology" rows="3">{{ old('methodology', $activity->methodology) }}</flux:textarea>
            @error('methodology')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <flux:select class="mb-5" label="Instructor" name="instructor_id">
                <flux:select.option value="">Sin Instructor</flux:select.option>
                @foreach($instructors as $instructor)
                    <flux:select.option value="{{ $instructor->id }}" :selected="$instructor->id == old('instructor_id', $activity->instructor_id)">
                        {{ $instructor->name }}
                    </flux:select.option>
                @endforeach
            </flux:select>
            @error('instructor_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div>
                <p class="text-sm font-medium mb-1">Estado</p>
                <flux:select class="mb-5" name="status">
                    <flux:select.option value="borrador" :selected="'borrador' == old('status', $activity->status)">Borrador</flux:select.option>
                    <flux:select.option value="publicado" :selected="'publicado' == old('status', $activity->status)">Publicado</flux:select.option>
                    <flux:select.option value="completado" :selected="'completado' == old('status', $activity->status)">Completado</flux:select.option>
                    <flux:select.option value="cancelado" :selected="'cancelado' == old('status', $activity->status)">Cancelado</flux:select.option>
                    <flux:select.option value="archivado" :selected="'archivado' == old('status', $activity->status)">Archivado</flux:select.option>
                </flux:select>
                @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-3 mt-5">
                <p class="text-sm font-medium">Activo: </p>
                <label class="flex items-center">
                    <input type="radio" name="is_active" value="1" @checked(old('is_active', $activity->is_active) == 1)>
                    <span class="ml-1">Sí</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="is_active" value="0" @checked(old('is_active', $activity->is_active) == 0)>
                    <span class="ml-1">No</span>
                </label>
                @error('is_active')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end mt-5">
                <flux:button variant="primary" type="submit">Actualizar Actividad</flux:button>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            function previewImage(event, selector) {
                const input = event.target;
                const preview = document.querySelector(selector);

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';
                }
            }
        </script>
    @endpush

</x-layouts.app>
