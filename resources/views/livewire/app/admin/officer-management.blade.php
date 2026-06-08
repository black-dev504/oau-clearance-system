<div>
    <div class="bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
            <flux:heading size="xl" level="1">Officer Management </flux:heading>
            <flux:text class="mb-6 mt-2 text-base">Wednesday, May 20, 2026</flux:text>



        </div>

    <div class="bg-white intro-y overflow-auto  dark:bg-zinc-800 dark:border-white/10 border border-gray-100 rounded-2xl mt-8 shadow-sm dark:shadow-none">
        <div class="px-8 py-6 border-b dark:border-white/10 border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold dark:text-zinc-100 text-gray-900 whitespace-nowrap">Officer List</h2>
                    <p class="text-sm text-gray-500 dark:text-zinc-400  mt-1 whitespace-nowrap">List of all officers across all units</p>
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
                            <div class="flex gap-3 w-fit items-center">
                                <div
                                    class="bg-gradient-to-br from-primary to-secondary text-white font-bold rounded-full image-fit zoom-in mr-1 h-12 w-12 flex items-center justify-center">
                                    <span>{{get_initials($officer->full_name)}}</span>
                                </div>
                                <div>
                                    <div class="font-medium mb-1 items-center text-gray-900 dark:text-zinc-100">{{$officer->full_name}}</div>

                                </div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">
                            <div>
                                <div class="text-sm text-gray-900 font-medium mb-1 dark:text-zinc-400">Email</div>
                                <div class="text-sm text-gray-500 dark:text-zinc-400">{{$officer->email}}</div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">
                            <div>
                                <div class="text-sm text-gray-900 font-medium mb-1 dark:text-zinc-400">Unit</div>
                                <div class="text-sm text-gray-500 dark:text-zinc-100">{{$officer->unit?->name}} </div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">
                            <div >
                                <div class="text-sm text-gray-900 font-medium mb-1 dark:text-zinc-400 whitespace-nowrap">Requests Handled</div>
                                <div class="text-sm text-gray-500 dark:text-zinc-100">276</div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">

                            <div>
                                <div class="text-sm text-gray-900 font-medium mb-1 dark:text-zinc-400">Status</div>
                                <div class="text-sm text-gray-500 dark:text-zinc-100">Active</div>
                            </div>
                        </td>

                        <td class=" w-auto px-6 py-4">

                            <div>
                                <div class="text-sm text-gray-900 font-medium mb-1 dark:text-zinc-400">Registration date</div>
                                <div class="text-sm text-gray-500 dark:text-zinc-100">{{$officer->created_at->format('F j, Y ')}}</div>
                            </div>
                        </td>

                        <td class=" w-auto pl-6 py-4">

                            <div class="flex items-center gap-3 shrink-0">
                                <div wire:click="openEditMode({{$officer->id}})">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </div>

                               <x-modals.delete-confirmation :id="$officer->id" fn="deleteOfficer"/>

                                @if($officer->status === 'suspended')
                                 <button type="button" wire:click="changeStatus({{$officer->id}},'reactivate')"  class="cursor-pointer px-4 py-2 bg-green-500 text-white text-sm rounded-lg hover:bg-green-700 transition-colors">
                                    Reactivate
                                </button>
                                @else

                                <button type="button" wire:click="changeStatus({{$officer->id}},'suspend')"  class="cursor-pointer px-4 py-2 bg-red-500 text-white text-sm rounded-lg hover:bg-red-700 transition-colors">
                                    Suspend
                                </button>
                                @endif
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
