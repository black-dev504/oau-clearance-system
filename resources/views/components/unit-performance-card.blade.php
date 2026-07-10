@php use App\Support\UnitType; @endphp
@props([
    'unitName' => '',
    'processed_requests' => 420,
    'approval_rate' => 85,
    'type' => 'library'

    ])


<div
    class="flex justify-between p-4 bg-background items-center dark:bg-zinc-600/20 dark:border-white/10 border border-gray-200 rounded-[14px]">

    <div class="flex gap-4">
        <x-icons.unit-icon :color="UnitType::accent($type)">

        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">

            <path
                d="M18 34V16C18 15.4696 18.2107 14.9609 18.5858 14.5858C18.9609 14.2107 19.4696 14 20 14H28C28.5304 14 29.0391 14.2107 29.4142 14.5858C29.7893 14.9609 30 15.4696 30 16V34H18Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path
                d="M18 24H16C15.4696 24 14.9609 24.2107 14.5858 24.5858C14.2107 24.9609 14 25.4696 14 26V32C14 32.5304 14.2107 33.0391 14.5858 33.4142C14.9609 33.7893 15.4696 34 16 34H18"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path
                d="M30 21H32C32.5304 21 33.0391 21.2107 33.4142 21.5858C33.7893 21.9609 34 22.4696 34 23V32C34 32.5304 33.7893 33.0391 33.4142 33.4142C33.0391 33.7893 32.5304 34 32 34H30"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M22 18H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M22 22H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M22 26H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M22 30H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
        </x-icons.unit-icon>
        <div class="flex flex-col">
            <span class="text-base text-gray-900 dark:text-zinc-100">{{$unitName}}</span>
            <span
                class="text-sm font-semibold text-gray-500 dark:text-zinc-400">{{$processed_requests}} Processed</span>
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
