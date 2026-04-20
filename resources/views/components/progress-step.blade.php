@props([
    'step' => '',
    'label' => '',
    'icon' => '',
    'first' => false
])

@php
    $completed = $this->completedSteps[$step] ?? false;

    $lineClasses = $completed
        ? 'bg-white'
        : 'bg-transparent';

    $containerText = $completed
        ? 'text-white'
        : 'text-white/20';

    $iconBg = $completed
        ? 'bg-white'
        : 'bg-white/20';
@endphp

@if(!$first)
    <div class="flex-1 h-1 max-w-[120px] mx-2 mb-6 rounded-full bg-white/20 overflow-hidden">
        <div class="w-full h-1 rounded-full {{ $lineClasses }}"></div>
    </div>
@endif

<div class="flex flex-col gap-1.5 justify-center items-center text-center {{ $containerText }}">
    <div class="w-fit rounded-full flex items-center justify-center py-2.5 px-4 {{ $iconBg }}">
        {{ $icon }}
    </div>
    <span>{{ $label }}</span>
</div>
