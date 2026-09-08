

<x-unit-management-table>
    <x-slot:options>
        <div class="flex justify-between">
            <div class="flex flex-col">
                <x-search/>
                <p class="text-[#6A7282] text-sm ml-1">{{$faculties->count()}} results</p>
            </div>

            <div>
                <x-modals.add-faculty />
            </div>

        </div>


    </x-slot:options>


    <x-slot:header>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Faculty</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Code</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Dean</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">No of Departments</th>
    </x-slot:header>

    @foreach($faculties as $faculty)

        <tr class="hover:bg-gray-50 group">
            <td class="px-6 py-4">
                <div class="flex gap-4 ">

                    <x-icons.unit-icon :color="$faculty->accent" :size="48">
                        <svg width="32" height="32" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.2799 7.28125C14.3992 7.2286 14.5005 7.14209 14.5712 7.03245C14.6418 6.92281 14.6788 6.79484 14.6774 6.6644C14.6761 6.53397 14.6365 6.40679 14.5636 6.29864C14.4907 6.19048 14.3876 6.10608 14.2672 6.05591L8.5532 3.45325C8.37949 3.37401 8.19079 3.33301 7.99987 3.33301C7.80894 3.33301 7.62024 3.37401 7.44653 3.45325L1.7332 6.05325C1.61451 6.10523 1.51354 6.19067 1.44264 6.29912C1.37174 6.40758 1.33398 6.53434 1.33398 6.66391C1.33398 6.79349 1.37174 6.92025 1.44264 7.0287C1.51354 7.13716 1.61451 7.2226 1.7332 7.27458L7.44653 9.87991C7.62024 9.95915 7.80894 10.0002 7.99987 10.0002C8.19079 10.0002 8.37949 9.95915 8.5532 9.87991L14.2799 7.28125Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.667 6.6665V10.6665" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 8.3335V10.6668C4 11.1973 4.42143 11.706 5.17157 12.081C5.92172 12.4561 6.93913 12.6668 8 12.6668C9.06087 12.6668 10.0783 12.4561 10.8284 12.081C11.5786 11.706 12 11.1973 12 10.6668V8.3335" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </x-icons.unit-icon>

                    <div class="flex justify-center items-center ">
                            <span
                                class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">{{Str::title($faculty->name)}}
                            </span>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4">
                <x-badge :value="$faculty->code" :color="$faculty->accent" />
            </td>


            <td class="px-6 py-4">
                {{$faculty->dean ?? '-'}}
            </td>

            <td class="px-6 py-4 flex gap-1">
                {{$faculty->departments->count()}}
                <div class="hidden group-hover:flex justify-between w-full items-center">
                    <a class="text-primary text-sm"> View > </a>

                    <div class="hidden group-hover:flex items-center gap-3 shrink-0">
                        <div wire:click="openEditMode({{$faculty->id}})">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                        <flux:modal.trigger name="delete-faculty">
                            <button type="button" wire:click="$set('deleteId', {{ $faculty->id }})">
                                <x-icons.delete />
                            </button>
                        </flux:modal.trigger>
                    </div>
                </div>

            </td>

        </tr>

    @endforeach

    <x-slot:pagination>
        @if($faculties->hasPages())
            <div class=" w-full px-4 py-4  dark:border-white/10">
                <div class=" w-full items-center" >
                    <div>

                        {{ $faculties->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        @endif
    </x-slot:pagination>

    <x-modals.delete-confirmation name="faculty" fn="deleteFaculty"/>

</x-unit-management-table>
