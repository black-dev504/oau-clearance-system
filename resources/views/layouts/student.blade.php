<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<x-navbar :logo="View::yieldContent('logo', 'assets/images/oauLogo.svg')" />

<main class="min-h-screen">
    @yield('content')
</main>

{{--<x-footer />--}}
@livewireScripts
</body>
</html>
