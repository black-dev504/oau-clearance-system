<div>
    <div class="p-6.5 w-full  grid grid-cols-2 rounded-[14px] shadow-xs bg-white dark:bg-zinc-800 dark:border-white/10 border border-[#E0DCD4]">

        <div class="flex-col flex gap-1 ">
            <h2>Priority level</h2>
            <div class="flex gap-2">
                @foreach(['all', 'low', 'medium', 'high'] as $priority)
                    <button
                        wire:click="$set('priority', '{{ $priority }}')"

                        @class([
                            'px-4 py-2 w-fit rounded-[10px]',
                            'bg-gradient-to-r from-primary to-secondary' => $this->priority === $priority,
                            'bg-white dark:bg-zinc-800 dark:text-zinc-100 dark:border-white/10 border border-gray-200 text-gray-700' => $this->priority !== $priority,
                        ])>

                       {{ ucfirst($priority) }}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="w-full flex justify-end items-center">
            <x-search  />
        </div>
    </div>


    @if($announcements->count() > 0 )
        @foreach($announcements as $announcement)
              <x-announcement-card :announcement="$announcement" />
        @endforeach
    @else
        <div class="flex flex-col items-center text-center justify-center py-12 bg-white h-full rounded-[14px] shadow-xs my-5 dark:bg-zinc-800 dark:border-white/10 border border-[#E0DCD4]">
            <x-icons.table-empty-state class="mx-auto mb-2" />
            <h1 class="text-[18px] text-black dark:text-zinc-100">No Announcement found.</h1>
            <p class="text-base text-gray-400 dark:text-zinc-400">There are no announcement to display. <br>New announcements will appear here once created.</p>

            <button class=" cursor-pointer px-4 py-3 bg-[#7F22FE]  text-white rounded-lg hover:bg-purple-700 transition-colors mt-4" >
                Refresh
            </button>
        </div>


    @endif

</div>
