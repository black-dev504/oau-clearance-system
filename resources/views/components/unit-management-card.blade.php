@props([
    'count' => '6',
    'heading' => 'Faculties',
    'subheading' => 'Top-level academic bodies'
])

<div class="flex flex-col w-full p-5 bg-white border-gray-200 border rounded-2xl ">

    <div class="flex gap-3">
        <div class="rounded-full p-3.5 flex items-center justify-center bg-[#F3F4F6]">

            {{$slot}}

        </div>
        <h1 class="font-black text-black text-3xl">{{$count}}</h1>

    </div>
    <h1 class="font-medium text-base">{{$heading}}</h1>
    <flux:text class="text-base">{{$subheading}}</flux:text>
</div>
