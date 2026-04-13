<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<x-layouts.sidebar :title="View::yieldContent('title', 'OAU CLEARANCE SYSTEM')" :unit="View::yieldContent('unit', 'UnitName')">
    <flux:main>

    {{ $slot }}
    </flux:main>
</x-layouts.sidebar>


</html>
