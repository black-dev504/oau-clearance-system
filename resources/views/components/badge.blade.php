@props([
    'value' => '',
    'color' => '#374151'
])

<div class="inline-flex w-fit items-center px-3 py-0.5 rounded-full"
     style="background-color: color-mix(in srgb, {{ $color }} 15%, white); color: {{ $color }}">
    <div class=" text-[12px] font-medium">
        {{ $value }}
    </div>
</div>
