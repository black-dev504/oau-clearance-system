<div>
    <div>
        <div class="bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
            <flux:heading size="xl" level="1">Announcements </flux:heading>
            <flux:text class="mb-6 mt-2 text-base">{{ now()->format('l, F d Y') }}</flux:text>



        </div>

        <div class="bg-white intro-y overflow-auto  dark:bg-zinc-800 dark:border-white/10 border border-gray-100 rounded-2xl mt-8 shadow-sm dark:shadow-none">
            <div class="px-8 py-6 border-b dark:border-white/10 border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold dark:text-zinc-100 text-gray-900 whitespace-nowrap">Announcements</h2>
                        <p class="text-sm text-gray-500 dark:text-zinc-400  mt-1 whitespace-nowrap">Create and manage system announcements</p>
                    </div>

                    <flux:modal.trigger name="add-announcement">
                        <button class="px-3 py-2 bg-primary text-white rounded-xl whitespace-nowrap">+ New Announcement</button>
                    </flux:modal.trigger>

                </div>
            </div>

            <table class="w-full dark:border-white/10 dark:border">
                <tbody class=" dark:bg-zinc-800 divide-y divide-gray-100 dark:divide-white/10">
            @if($announcements->count() > 0)
                @foreach($announcements as $announcement)
                    <tr wire:key="{{$announcement->id}}" class="overflow-auto  px-8 py-6 dark:hover:bg-zinc-700 hover:bg-gray-50/50 transition-colors">

                        <td class=" w-auto  px-6 py-4">
                                 <x-announcement-card :announcement="$announcement" />
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="dark:bg-zinc-800">
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center space-y-2 w-full">
                            <x-icons.table-empty-state class="mx-auto mb-2" />
                            <h1 class="text-[18px] text-black dark:text-zinc-100">No Announcement found.</h1>
                            <p class="text-base text-gray-400 dark:text-zinc-400">There are no announcement to display. <br>Click on 'New Announcement' to create announcements.</p>

                            <button class=" cursor-pointer px-4 py-3 bg-[#7F22FE]  text-white rounded-lg hover:bg-purple-700 transition-colors mt-4" >
                                Refresh
                            </button>
                        </div>

                    </td>
                </tr>
            @endif

                </tbody>
            </table>

        </div>


    </div>
    <x-modals.add-announcement />
    <x-modals.view-announcement />
</div>
