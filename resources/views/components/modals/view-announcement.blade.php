

@php
    $priorityClasses =  match ($this->selectedAnnouncement?->priority) {
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


<flux:modal name="view-announcement" x-on:close="$wire.resetModal()" wire:key="view-announcement" class="min-w-5xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
    <div class="w-full  rounded-t-2xl p-7 flex bg-gradient-to-r from-primary  to-[#8E51FF]">
        <div class="flex flex-col gap-3 flex-start">
            <x-tag :status="$this->selectedAnnouncement?->priority. ' priority'" :classes="$priorityClasses"/>

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white mb-1">{{$this->selectedAnnouncement?->title}}</h1>

            </div>
        </div>
    </div>


    <div class="px-7 py-6">
        <div class="whitespace-pre-line">

            <p class="text-base text-[#666666] dark:text-zinc-400">{{$this->selectedAnnouncement?->content}}</p>
        </div>

        <div class="border-t border-[#E0DCD4] dark:border-white/10 mt-6 flex justify-between pt-4 ">
            <div class="bg-gradient-to-r text-white from-primary to-secondary font-bold rounded-full image-fit zoom-in mr-3 h-10 w-10 flex items-center justify-center">
                <span>{{get_initials($this->selectedAnnouncement?->creator->full_name)}}</span>
            </div>

            <div class="flex-1 min-w-0 grid grid-cols-4 gap-6">
                <div>
                    <div class="flex flex-col">
                        <div class="font-medium text-[#2D2D2D] text-sm dark:text-zinc-100">{{$this->selectedAnnouncement?->creator->full_name}}</div>
                        <div class="text-[12px] text-[#666666] dark:text-zinc-400">{{$this->selectedAnnouncement?->creator->role}}


                    </div>
                </div>
            </div>


        </div>
            <div class="flex flex-col items-end">
                <p class="text-sm font-medium text-[#2D2D2D]">Published on:</p>
            <div class="text-sm text-[#C27AFF] dark:text-zinc-400">{{$this->selectedAnnouncement?->created_at->format('F j, Y ')}}</div>
            </div>
    </div>




</flux:modal>
