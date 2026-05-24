@props([
    'unitName' => '',
    'processed_requests' => 420,
    'approval_rate' => 85,

    ])

@php

    $color =  match(strtolower($unitName)) {
        'library' => '#8B5CF6',
        'dsa' => '#3B82F6',
        'hostel' => '#10B981',
        'faculty' => '#F59E0B',
        'department' => '#EF4444',
        'senate' => '#EC4899',
        default => '#6B7280'
    };
 @endphp


<div class="flex justify-between p-4 bg-background items-center dark:bg-zinc-600/20 dark:border-white/10 border border-gray-200 rounded-[14px]">

    <div class="flex gap-4">
        <x-icons.unit-icon style="color: {{ $color }}" />
        <div class="flex flex-col">
            <span class="text-base text-gray-900 dark:text-zinc-100">{{$unitName}}</span>
            <span class="text-sm font-semibold text-gray-500 dark:text-zinc-400">{{$processed_requests}} Processed</span>
        </div>
    </div>

    <div class="flex flex-col items-end">
        <span class="text-sm text-gray-500 dark:text-zinc-400">Approval Rate</span>
{{--        <div class="w-full rounded-full h-2 bg-gray-300"> <div style="width: {{$approval_rate}}%;" class="bg-green-400 h-2 rounded-full transition-all duration-900"></div></div>--}}

        <div
            x-data="{ width: 0 }"
            x-init="setTimeout(() => width = {{ $approval_rate }}, {{rand(50,150)}})"
            class="w-full rounded-full h-2 bg-gray-300"
        >
            <div
                :style="`width: ${width}%`"
                class="bg-green-400 h-2 rounded-full transition-all duration-700 ease-out"
            ></div>
        </div>
        <span class="text-lg font-semibold text-gray-900 dark:text-zinc-100">{{$approval_rate}}%</span>

    </div>
</div>
