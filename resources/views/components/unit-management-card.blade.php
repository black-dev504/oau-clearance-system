@props([
    'count' => '6',
    'heading' => 'Faculties',
    'subheading' => 'Top-level academic bodies',
    'currentTab' => ''
])
@php

 $bgColor = $currentTab == strtolower($heading) ? 'bg-gradient-to-r from-[#7F22FE] to-[#8200DB] ' : 'bg-white ';
 $textColor = $currentTab === strtolower($heading) ? 'text-white' : '';
@endphp

<div class="flex flex-col w-full p-5 {{$bgColor}} border-gray-200 border rounded-2xl ">


    <div class="flex gap-3 mb-1">
        <div class=" flex items-center justify-center">

            {{$slot}}

        </div>
        <h1 class="font-black {{$textColor}} text-3xl">{{$count}}</h1>

    </div>
    <h1 class="font-medium text-base {{ $textColor}}">{{$heading}}</h1>
    <flux:text class="text-sm {{ $textColor}}">{{$subheading}}</flux:text>
</div>
