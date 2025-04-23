<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="bg-muted hidden h-full justify-center items-center flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
                <div class="overflow-hidden justify-items-center">
                    <img class="aspect-square border-0 shadow-0 object-scale-down size-96 items-center" src="{{ Storage::disk('public')->url('images/logos/Logo3.png') }}"
                         alt="Image from Storage">
                    <p class="text-black dark:text-white text-3xl">Computación Afectiva e Innovación Educativa</p>
                </div>



            </div>
            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('inicio') }}" class="z-20 flex flex-col items-center content-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-full items-center justify-center rounded-md text-5xl mb-5 accent-blue-900">
                            CAFINED Lab
                        </span>


                        <span class="sr-only">{{ config('app.name', 'cafined') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
