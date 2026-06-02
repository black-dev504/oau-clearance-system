<div>
    <div class="bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
            <flux:heading size="xl" level="1">Officer Management </flux:heading>
            <flux:text class="mb-6 mt-2 text-base">Wednesday, May 20, 2026</flux:text>



        </div>

    <div class="bg-white intro-y overflow-auto  dark:bg-zinc-800 dark:border-white/10 border border-gray-100 rounded-2xl mt-8 shadow-sm dark:shadow-none">
        <div class="px-8 py-6 border-b dark:border-white/10 border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold dark:text-zinc-100 text-gray-900 whitespace-nowrap">System Activity</h2>
                    <p class="text-sm text-gray-500 dark:text-zinc-400  mt-1 whitespace-nowrap">Recent activities across all units</p>
                </div>

               <div>
                   <x-modals.add-officer />
               </div>

            </div>
        </div>

        <table class="w-full dark:border-white/10 dark:border">
            <tbody class=" dark:bg-zinc-800 divide-y divide-gray-100 dark:divide-white/10">

            @if($officers->count() > 0)

                @foreach($officers as $officer)
                    <tr wire:key="officer--{{ $officer->id }}" class="overflow-auto  px-8 py-6 dark:hover:bg-zinc-700 hover:bg-gray-50/50 transition-colors">

                        <td class=" w-auto px-6 py-4">
                            <div class="flex gap-3 w-fit">
                                <div
                                    class="bg-gradient-to-br from-primary to-secondary text-white font-bold rounded-full image-fit zoom-in mr-1 h-12 w-12 flex items-center justify-center">
                                    <span>{{get_initials($officer->full_name)}}</span>
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-2 mb-1 w-fit">
                                        <div class="font-medium text-gray-900 dark:text-zinc-100">{{$officer->full_name}}</div>
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-zinc-400">{{$officer->email}}</div>
                                </div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-1 dark:text-zinc-400">Unit</div>
                                <div class="text-sm text-gray-900 dark:text-zinc-100">{{$officer->unit?->name}} </div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-1 dark:text-zinc-400">Unit</div>
                                <div class="text-sm text-gray-900 dark:text-zinc-100">{{$officer->unit?->name}} </div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">
                            <div >
                                <div class="text-sm text-gray-500 mb-1 dark:text-zinc-400 whitespace-nowrap">Requests Handled</div>
                                <div class="text-sm text-gray-900 dark:text-zinc-100">276</div>
                                <div class="text-sm text-gray-900 dark:text-zinc-100 whitespace-nowrap">Since {{ $officer->created_at->diffForHumans()}}</div>


                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">

                            <div>
                                <div class="text-sm text-gray-500 mb-1 dark:text-zinc-400">Status</div>
                                <div class="text-sm text-gray-900 dark:text-zinc-100">Active</div>
                            </div>
                        </td>

                        <td class=" w-auto pl-6 py-4">

                            <div class="flex items-center gap-3 shrink-0">
                                <button wire:click="deleteOfficer({{$officer->id}})">
                                    <x-icons.delete />
                                </button>

                                <button type="button"  wire:click="openEditMode({{$officer->id}})" class="cursor-pointer px-4 py-2 bg-primary text-white text-sm rounded-lg hover:bg-violet-700 transition-colors">
                                    Edit
                                </button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            @else

                <div class="flex flex-col items-center justify-center py-12">
                    <x-icons.table-empty-state />
                    <h3 class="text-lg font-medium text-gray-900 dark:text-zinc-100">No Officers Available</h3>
                    <p class="text-sm text-gray-500 dark:text-zinc-400 mt-1">You have not received any clearance requests recently.</p>
                    <button class=" cursor-pointer px-4 py-3 bg-[#7F22FE]  text-white rounded-lg hover:bg-purple-700 transition-colors mt-4" >
                        Refresh
                    </button>
                </div>
            @endif
            </tbody>
        </table>
    </div>


</div>
