@props([
    'title' => 'Global Marketing',
    'description' => 'Subscription expires in 3 days',
    'size' => 'High',
    'sizeBg' => 'bg-[#E33B32]',
])

<div
    class="w-full border dark:bg-zinc-700 bg-[#F9F9F9] border-[#D0D5DD] rounded-xl flex items-center justify-between p-5">
    <div class="flex flex-col gap-y-1">
        <div class="{{ $sizeBg }} text-white w-fit rounded-full px-3 py-[1px] text-xs"> {{ $size }}
        </div>
        <h4 class="text-[#1D2939] dark:text-zinc-300 font-medium">{{ $title }}</h4>
        <span class="text-[#8B8C8D] text-sm">{{ $description }}</span>
    </div>

    <div class="w-fit rounded-full border bg-white border shadow-sm border-gray-200  dark:bg-gray-500 flex items-center gap-x-3 px-3 py-1.5">
        <x-icons.bell class="w-6 h-6 text-primary-600 dark:text-white" />
        <span class="font-medium text-sm text-primary-600 dark:text-white">Alert</span>
    </div>

</div>
