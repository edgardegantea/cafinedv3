<x-layouts.app.sidebar :title="$title ?? null">

    @stack('css')


    <flux:main>
        {{ $slot }}
    </flux:main>

    @stack('js')
    @if(session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif

</x-layouts.app.sidebar>
