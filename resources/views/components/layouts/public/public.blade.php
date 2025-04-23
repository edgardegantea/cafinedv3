@php
    $links = [
        [
            'class' => 'text-accent-foreground',
            'name'  => 'Inicio',
            'icon'  => '',
            'url'   => route('inicio'),
            'current'    => request()->routeIs('inicio'),
        ],
        [
            'name'  => 'Comunicación',
            'icon'  => '',
            'url'   => route('posts.index'),
            'current'    => request()->routeIs('posts.*'),
        ],

        [
            'name'  => 'Actividades',
            'icon'  => '',
            'url'   => route('activities'),
            'current'    => request()->routeIs('activities'),
        ],

        [
            'name'  => 'Nuestro equipo',
            'icon'  => '',
            'url'   => route('equipo'),
            'current'    => request()->routeIs('equipo'),
        ],
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    <style>
        .flux-navbar-item[aria-current="page"] {
            color: #007bff;
            font-weight: bold;
        }

        .flux-navlist-item[aria-current="page"] {
            background-color: #f0f8ff;
            color: #007bff;
        }
    </style>
</head>
<body class="min-h-screen bg-zinc-200 dark:bg-zinc-200 dark:text-black">
<flux:header container class="bg-white border-gray-200 dark:bg-gray-900">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

    <flux:brand href="#" logo="{{ Storage::disk('public')->url('images/logos/Logo3.png') }}" name="CAFINED Lab" />

    <flux:navbar class="-mb-px max-lg:hidden">
        @foreach($links as $link)
            <flux:navlist.item
                :icon="$link['icon']"
                :href="$link['url']"
                :current="$link['current']"
                wire:navigate>
                {{ $link['name'] }}
            </flux:navlist.item>
        @endforeach
    </flux:navbar>

    <flux:spacer />

    @auth()
        <flux:dropdown position="top" align="end">
            <flux:profile
                class="cursor-pointer"
                :initials="auth()->user()->initials()"
            />
            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                >
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    @else
        <flux:dropdown position="top" align="end">
            <flux:button
                class="cursor-pointer"
                icon="arrow-right-end-on-rectangle"
            >
                Ingresar
            </flux:button>
            <flux:menu>
                <flux:menu.item :href="route('login')" icon="arrow-right-end-on-rectangle" class="w-full">
                    {{ __('Iniciar sesión') }}
                </flux:menu.item>
                <flux:menu.item :href="route('login')" icon="user-plus" class="w-full">
                    {{ __('Registrarme') }}
                </flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    @endauth
</flux:header>

<flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo />
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Platform')">
            <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </flux:navlist.item>
            @foreach($links as $link)
                <flux:navlist.item
                    :icon="$link['icon']"
                    :href="$link['url']"
                    :current="$link['current']"
                    wire:navigate>
                    {{ $link['name'] }}
                </flux:navlist.item>
            @endforeach
        </flux:navlist.group>
    </flux:navlist>

    <flux:spacer />
</flux:sidebar>

{{ $slot }}

@fluxScripts

<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="https://v2.cafined.org" class="flex items-center">
                    <img src="{{ Storage::disk('public')->url('images/logos/Logo3.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CAFINED Lab</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Recursos</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Talleres</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Cursos</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Síguenos</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline ">Github</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Política de privacidad</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Términos &amp; Condiciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© <?php echo date('Y'); ?>. <a href="https://cafined.org/" class="hover:underline">cafined lab™</a>. All Rights Reserved. Created by <a href="https://cafined.org/angelarmenta/" class="hover:underline">Roberto Ángel Meléndez-Armenta</a>. Developed by <a href="https://cafined.org/edegantea/" class="hover:underline">edegantea</a>.
          </span>
            <div class="flex mt-4 sm:justify-center sm:mt-0">
                {{-- ... (Iconos de redes sociales) ... --}}
            </div>
        </div>
    </div>
</footer>

</body>
</html>
