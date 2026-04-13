@props([
    'number' => '',
    'text' => '',
])

<div class="flex gap-4">
    <div class="rounded-full w-12 h-12 items-center flex px-4.5 py-3.5 bg-[#F4F4F4]">
        <h1 class="text-xl">{{$number}}</h1>
    </div>

    <h1 class="text-gray-900 text-base">{{$text}}</h1>
</div>
