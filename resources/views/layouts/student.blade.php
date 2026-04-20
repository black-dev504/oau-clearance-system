<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<x-navbar :logo="'assets/images/oauLogo.svg'" />

<main class="min-h-screen bg-background px-20">
    {{ $slot }}
</main>

@fluxScripts
@livewireScripts
</body>
</html>
