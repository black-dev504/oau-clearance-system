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

            </div>
        </div>

        <table class="w-full dark:border-white/10 dark:border">
            <tbody class=" dark:bg-zinc-800 divide-y divide-gray-50 dark:divide-white/10">

            @if($officers->count() > 0)

                @foreach($officers as $officer)
                    <tr wire:key="officer--{{ $officer->id }}" class="overflow-auto px-8 py-6 dark:hover:bg-zinc-700 hover:bg-gray-50/50 transition-colors">

                        <td class=" w-auto px-6 py-4">
                            <div class="flex gap-3 w-fit">
                                <div
                                    class="bg-gradient-to-br from-primary to-secondary text-white font-bold rounded-full image-fit zoom-in mr-1 h-12 w-12 flex items-center justify-center">
                                    <span>{{get_initials($officer->name)}}</span>
                                </div>

                                <div>
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

                        <td class=" w-auto px-6 py-4">

                            <div class="flex items-center gap-3 shrink-0">
                                <button type="button" wire:click="openModal('student-contact', {{ $officer->id }})" class="cursor-pointer flex justify-center items-center w-9 h-9 border rounded-[10px] hover:bg-gray-100 dark:border-white/10  border-[#E0DCD4]">
                                    <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.666748 2.66675L5.92675 6.17342C6.14586 6.3196 6.40335 6.39761 6.66675 6.39761C6.93015 6.39761 7.18764 6.3196 7.40675 6.17342L12.6667 2.66675M2.00008 10.0001H11.3334C11.687 10.0001 12.0262 9.85961 12.2762 9.60956C12.5263 9.35951 12.6667 9.02037 12.6667 8.66675V2.00008C12.6667 1.64646 12.5263 1.30732 12.2762 1.05727C12.0262 0.807224 11.687 0.666748 11.3334 0.666748H2.00008C1.64646 0.666748 1.30732 0.807224 1.05727 1.05727C0.807224 1.30732 0.666748 1.64646 0.666748 2.00008V8.66675C0.666748 9.02037 0.807224 9.35951 1.05727 9.60956C1.30732 9.85961 1.64646 10.0001 2.00008 10.0001Z" stroke="#666666" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>

                                <button type="button"  wire:click="openModal('view-request', {{ $officer->id }})" class="cursor-pointer px-4 py-2 bg-primary text-white text-sm rounded-lg hover:bg-violet-700 transition-colors">
                                    Review
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
