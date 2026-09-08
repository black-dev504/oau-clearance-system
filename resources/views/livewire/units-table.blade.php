@php use App\Support\UnitType; @endphp

<x-unit-management-table>
    <x-slot:options>
        <div class="flex justify-between">

            <div class="flex flex-col gap-1">
                <x-search/>
                <p class="text-[#6A7282] text-sm ml-2">{{$unitData->count()}} results</p>
            </div>
            <div>
            <x-modals.add-unit/>
            </div>
        </div>
    </x-slot:options>


    <x-slot:header>

        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Unit</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Type</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Officers</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Request/MO</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Status</th>
    </x-slot:header>

    @foreach($unitData as $unit)

        <tr class="hover:bg-gray-50 group">
            <td class="px-6 py-4">
                <div class="flex gap-4 ">
                    <x-icons.unit-icon :color="UnitType::accent($unit->type)">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path
                                d="M18 34V16C18 15.4696 18.2107 14.9609 18.5858 14.5858C18.9609 14.2107 19.4696 14 20 14H28C28.5304 14 29.0391 14.2107 29.4142 14.5858C29.7893 14.9609 30 15.4696 30 16V34H18Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path
                                d="M18 24H16C15.4696 24 14.9609 24.2107 14.5858 24.5858C14.2107 24.9609 14 25.4696 14 26V32C14 32.5304 14.2107 33.0391 14.5858 33.4142C14.9609 33.7893 15.4696 34 16 34H18"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path
                                d="M30 21H32C32.5304 21 33.0391 21.2107 33.4142 21.5858C33.7893 21.9609 34 22.4696 34 23V32C34 32.5304 33.7893 33.0391 33.4142 33.4142C33.0391 33.7893 32.5304 34 32 34H30"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 18H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M22 22H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M22 26H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M22 30H26" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </x-icons.unit-icon>

                    <div class="flex flex-col ">
                            <span
                                class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">{{Str::title($unit->name)}}
                            </span>
                        <span class=" uppercase text-sm text-gray-400 dark:text-zinc-400">{{$unit->code}}</span>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4">
                <x-badge :value="Str::title($unit->type)" :color="UnitType::accent($unit->type)"/>
            </td>


            <td class="px-6 py-4">
                {{$unit->users->count()}}
            </td>

            <td class="px-6 py-4">
                574
                {{--                    <div--}}
                {{--                        x-data="{ width: 0 }"--}}
                {{--                        x-init="setTimeout(() => width = {{ $approval_rate }}, {{rand(50,150)}})"--}}
                {{--                        class="w-full rounded-full h-2 bg-gray-300"--}}
                {{--                    >--}}
                {{--                        <div--}}
                {{--                            :style="`width: ${width}%`"--}}
                {{--                            class="bg-green-400 h-2 rounded-full transition-all duration-700 ease-out"--}}
                {{--                        ></div>--}}
                {{--                    </div>--}}
            </td>

            <td class="px-6 py-4  flex items-center justify-between gap-4">
                <x-status-badge :status="$unit->status" :classes="$unit->status == 'active'? ['dot'=> 'bg-green-500',
                                                                                          'bg' => 'bg-green-100',
                                                                                           'text' => 'text-green-500'
                                                                                           ]:
                                                                                           ['dot'=> 'bg-red-500',
                                                                                          'bg' => 'bg-red-100',
                                                                                           'text' => 'text-red-500'
                                                                                           ]
                                                                                           "/>

                <div class="hidden group-hover:flex items-center gap-3 shrink-0">
                    <div wire:click="openEditMode({{$unit->id}})">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>

                    <flux:modal.trigger name="delete-unit">
                        <button type="button" wire:click="$set('deleteId', {{ $unit->id }})">
                        <x-icons.delete />
                        </button>
                    </flux:modal.trigger>
                </div>
            </td>

        </tr>



    @endforeach

   <x-slot:pagination>
       @if($unitData->hasPages())
           <div class=" w-full px-4 py-4  dark:border-white/10">
               <div class=" w-full items-center" >
                   <div>

                       {{ $unitData->links('vendor.pagination.tailwind') }}
                   </div>
               </div>
           </div>
       @endif
   </x-slot:pagination>

    <x-modals.delete-confirmation name="unit" fn="deleteUnit"/>

</x-unit-management-table>
