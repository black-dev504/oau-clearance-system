@props([
    'color' => '#6B7280',
    'size' => 48,
])

<div
    class="flex items-center justify-center rounded-xl"
    style="
        width: {{ $size }}px;
        height: {{ $size }}px;
        color: {{ $color }};
        background-color: color-mix(in srgb, {{ $color }} 15%, white);
    "
>
    {{ $slot }}
</div>
