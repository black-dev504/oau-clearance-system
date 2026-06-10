@props([
    'announcement' => '',

])

@php
    $priorityClasses =  match ($announcement?->priority) {
         'high' => [
             'bg' => 'bg-red-100',
             'dot' => 'bg-red-500',
             'text' => 'text-red-800',
             'icon' => 'text-red-500',
             'border' => 'border-red-500'
             ],

          'medium' => [
             'bg' => 'bg-yellow-100',
             'dot' => 'bg-yellow-500',
             'text' => 'text-yellow-800',
                 'icon' => 'text-yellow-500',
                 'border' => 'border-yellow-500'
             ],
          'low' => [
             'bg' => 'bg-green-100',
             'dot' => 'bg-green-500',
             'text' => 'text-green-800',
              'icon' => 'text-green-500',
              'border' => 'border-green-500'
             ],
         default => [
                'bg' => 'bg-gray-100',
                'dot' => 'bg-gray-500',
                'text' => 'text-gray-800',
                'icon' => 'text-gray-500',
                'border' => 'border-gray-500'

         ],
     };



@endphp


<div
    class="w-full border dark:bg-zinc-700 bg-[#F9F9F9]  {{$priorityClasses['border']}} rounded-xl flex items-center justify-between p-5">
    <div class="flex flex-col gap-y-1">
        <x-tag :status="$announcement?->priority. ' Priority'"
               :classes="$priorityClasses ?? []"/>

        <h1 class="font-bold text-xl dark:text-zinc-100">{{$announcement?->title}}</h1>
        <p class="text-base text-[#666666] dark:text-zinc-400">  {{ Str::limit($announcement?->content, 150) }}</p>
    </div>

    <div class="w-fit rounded-full border bg-white  shadow-sm border-gray-200  dark:bg-gray-500 flex items-center gap-x-3 px-3 py-1.5">
        <x-icons.eye class="w-6 h-6 text-primary-600 dark:text-white" />
        <span class="font-medium text-sm text-primary-600 dark:text-white">View</span>
    </div>

</div>
