@props([
    'unitName' => 'Library',
    'completedTasks' => 420,
    'efficiency' => 85,

    ])


<div class="flex justify-between p-4 bg-background items-center dark:bg-zinc-600/20 dark:border-white/10 border border-gray-200 rounded-[14px]">

    <div class="flex gap-4">
        <x-icons.unit-icon />
        <div class="flex flex-col">
            <span class="text-base text-gray-900 dark:text-zinc-100">{{$unitName}}</span>
            <span class="text-sm font-semibold text-gray-500 dark:text-zinc-400">{{$completedTasks}} completed</span>
        </div>
    </div>

    <div class="flex flex-col items-end">
        <span class="text-sm text-gray-500 dark:text-zinc-400">Efficiency</span>
        <div class="w-full rounded-full h-2 bg-gray-300"> <div style="width: {{$efficiency}}%;" class="bg-green-400 h-2 rounded-full transition-all duration-700"></div></div>
        <span class="text-lg font-semibold text-gray-900 dark:text-zinc-100">85%</span>

    </div>
</div>
