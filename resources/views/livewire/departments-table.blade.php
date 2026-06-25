

<x-unit-management-table>
    <x-slot:options>
        <div class="flex justify-between">

            <div class="flex gap-3">

                <div class="flex flex-col ">
                    <x-search/>
                    <p class="text-[#6A7282] text-sm ml-1 ">{{$departments->count()}} results</p>
                </div>
                <flux:select>
                    <flux:select.option >All Faculties </flux:select.option>
                    @foreach($faculties as $faculty)
                        <flux:select.option value="{{$faculty->id}}">{{$faculty->name}}</flux:select.option>
                    @endforeach

                </flux:select>
            </div>

            <div>

                <x-modals.add-department />
            </div>

        </div>
    </x-slot:options>


    <x-slot:header>

        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Department</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Code</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Head of Department</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Unit</th>
        <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Faculty</th>

    </x-slot:header>

    @foreach($departments as $department)

        <tr class="hover:bg-gray-50 group">
            <td class="px-6 py-4">
                <div class="flex gap-4 ">

                    <x-icons.unit-icon color="#2B7FFF" :size="48">
                        <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_692_1648)">
                                <path d="M8.55363 1.45325C8.37993 1.37401 8.19123 1.33301 8.0003 1.33301C7.80938 1.33301 7.62068 1.37401 7.44697 1.45325L1.73363 4.05325C1.61533 4.10541 1.51475 4.19085 1.44414 4.29915C1.37353 4.40746 1.33594 4.53396 1.33594 4.66325C1.33594 4.79254 1.37353 4.91904 1.44414 5.02734C1.51475 5.13565 1.61533 5.22108 1.73363 5.27325L7.45364 7.87991C7.62734 7.95915 7.81604 8.00015 8.00697 8.00015C8.19789 8.00015 8.38659 7.95915 8.5603 7.87991L14.2803 5.27991C14.3986 5.22775 14.4992 5.14231 14.5698 5.03401C14.6404 4.9257 14.678 4.7992 14.678 4.66991C14.678 4.54062 14.6404 4.41412 14.5698 4.30582C14.4992 4.19751 14.3986 4.11208 14.2803 4.05991L8.55363 1.45325Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1.33301 8C1.33269 8.12751 1.36895 8.25244 1.43749 8.35997C1.50602 8.46749 1.60396 8.55311 1.71968 8.60667L7.45301 11.2133C7.62581 11.2916 7.81332 11.3321 8.00301 11.3321C8.1927 11.3321 8.38021 11.2916 8.55301 11.2133L14.273 8.61333C14.391 8.56029 14.491 8.47406 14.5609 8.36516C14.6307 8.25625 14.6674 8.12937 14.6663 8" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1.33301 11.3335C1.33269 11.461 1.36895 11.5859 1.43749 11.6935C1.50602 11.801 1.60396 11.8866 1.71968 11.9402L7.45301 14.5468C7.62581 14.6251 7.81332 14.6656 8.00301 14.6656C8.1927 14.6656 8.38021 14.6251 8.55301 14.5468L14.273 11.9468C14.391 11.8938 14.491 11.8076 14.5609 11.6987C14.6307 11.5897 14.6674 11.4629 14.6663 11.3335" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_692_1648">
                                    <rect width="16" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>


                    </x-icons.unit-icon>

                    <div class="flex justify-center items-center ">
                            <span
                                class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">{{$department->name}}
                            </span>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4">
                <x-badge :value="strtoupper($department->code)" color="#2B7FFF" />
            </td>


            <td class="px-6 py-4">
                {{$department->hod ?? '-'}}
            </td>

            <td class="px-6 py-4">
                {{$department->unit->name ?? '-'}}
            </td>

            <td class="px-6 py-4 flex gap-1 whitespace-nowrap">
                <x-badge :value="strtoupper($department->faculty->code)" :color="$department->faculty->accent" />

                <div class="hidden group-hover:flex justify-between w-full items-center">
                    <a class="text-primary text-sm"> View > </a>

                    <div class="flex items-center gap-3 shrink-0">
                        <div wire:click="openEditMode({{$department->id}})">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                        <x-modals.delete-confirmation :id="$department->id" fn="deleteDepartment"/>
                    </div>
                </div>
            </td>




        </tr>

    @endforeach


</x-unit-management-table>
