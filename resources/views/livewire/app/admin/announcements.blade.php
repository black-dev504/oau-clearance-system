<div>
    <div>
        <div class="bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
            <flux:heading size="xl" level="1">Announcements </flux:heading>
            <flux:text class="mb-6 mt-2 text-base">Wednesday, May 20, 2026</flux:text>



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

                @foreach($announcements as $announcement)
                    <tr wire:key="{{$announcement->id}}" class="overflow-auto  px-8 py-6 dark:hover:bg-zinc-700 hover:bg-gray-50/50 transition-colors">

                        <td class=" w-auto  px-6 py-4">
                           <x-announcement-card :title="$announcement->title" :description="$announcement->content" :priority="$announcement->priority" :announcement="$announcement" />
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>


    </div>
    <x-modals.add-announcement />
</div>
