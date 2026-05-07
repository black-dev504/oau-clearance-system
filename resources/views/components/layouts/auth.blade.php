<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
{{--    <title>@yield('title', 'OAU CLEARANCE SYSTEM')</title>--}}
    @livewireStyles
</head>
<body>
{{--<x-navbar :logo="View::yieldContent('logo', 'assets/images/oauLogo.svg')" />--}}


<main class="min-h-screen">
   {{ $slot }}
</main>

@livewireScripts
</body>
</html>
