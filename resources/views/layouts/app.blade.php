<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>
<x-layouts.sidebar >
    <flux:main>

        {{ $slot }}
    </flux:main>
</x-layouts.sidebar>

@fluxScripts
</body>



</html>
