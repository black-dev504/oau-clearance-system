
@php use App\Support\UnitType; @endphp

<x-unit-management-table>
    <x-slot:options>
        <div class="flex justify-between">

            <div class="flex flex-col ">
                <x-search/>
                <p class="text-[#6A7282] text-sm ml-1">{{$hostels->count()}} results</p>
            </div>
            <div>
                <x-modals.add-hostel />
            </div>
        </div>
    </x-slot:options>


    <x-slot:header>

        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Hostel</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Gender</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Warden</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Code</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Status</th>

    </x-slot:header>

    @foreach($hostels as $hostel)

        <tr class="hover:bg-gray-50 group">
            <td class="px-6 py-4">
                <div class="flex gap-4 ">

                    <x-icons.unit-icon color="#E17100" :size="48">
                        <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 14V8.66667C10 8.48986 9.92976 8.32029 9.80474 8.19526C9.67971 8.07024 9.51014 8 9.33333 8H6.66667C6.48986 8 6.32029 8.07024 6.19526 8.19526C6.07024 8.32029 6 8.48986 6 8.66667V14" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 6.66648C1.99995 6.47253 2.04222 6.2809 2.12386 6.10496C2.20549 5.92902 2.32453 5.77301 2.47267 5.64782L7.13933 1.64848C7.37999 1.44509 7.6849 1.3335 8 1.3335C8.3151 1.3335 8.62001 1.44509 8.86067 1.64848L13.5273 5.64782C13.6755 5.77301 13.7945 5.92902 13.8761 6.10496C13.9578 6.2809 14 6.47253 14 6.66648V12.6665C14 13.0201 13.8595 13.3592 13.6095 13.6093C13.3594 13.8593 13.0203 13.9998 12.6667 13.9998H3.33333C2.97971 13.9998 2.64057 13.8593 2.39052 13.6093C2.14048 13.3592 2 13.0201 2 12.6665V6.66648Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </x-icons.unit-icon>

                    <div class="flex justify-center items-center ">
                            <span
                                class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">{{$hostel?->name}}
                            </span>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4">
                <x-badge :value="Str::title($hostel?->gender)" :color="$hostel->gender === 'male' ? '#1447E6': '#C6005C' " />
            </td>

            <td class="px-6 py-4">
                {{$hostel?->warden ?? '-'}}
            </td>

            <td class="px-6 py-4 ">
                <x-badge :value="strtoupper($hostel?->code)" color="#E17100" />

            </td>

            <td class="flex px-6 py-4 group">
                <x-status-badge :status="$hostel->status" :classes="$hostel->status == 'active'? ['dot'=> 'bg-green-500',
                                                                                          'bg' => 'bg-green-100',
                                                                                           'text' => 'text-green-500'
                                                                                           ]:
                                                                                           ['dot'=> 'bg-red-500',
                                                                                          'bg' => 'bg-red-100',
                                                                                           'text' => 'text-red-500'
                                                                                           ]
                                                                                           "/>

                <div class="hidden group-hover:flex justify-between w-full items-center">

                    <div></div>

                    <div class="hidden group-hover:flex items-center gap-3 shrink-0">
                        <div wire:click="openEditMode({{$hostel->id}})">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                        <flux:modal.trigger name="delete-hostel">
                            <button type="button" wire:click="$set('deleteId', {{ $hostel->id }})">
                                <x-icons.delete />
                            </button>
                        </flux:modal.trigger>
                    </div>
                </div>

            </td>









        </tr>

    @endforeach
    <x-slot:pagination>
        @if($hostels->hasPages())
            <div class=" w-full px-4 py-4  dark:border-white/10">
                <div class=" w-full items-center" >
                    <div>

                        {{ $hostels->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        @endif
    </x-slot:pagination>

    <x-modals.delete-confirmation name="hostel" fn="deleteHostel"/>

</x-unit-management-table>
