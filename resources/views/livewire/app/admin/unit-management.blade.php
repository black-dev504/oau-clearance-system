@php use App\Support\UnitType; @endphp
<div class="flex flex-col gap-6">
    <div
        class=" flex items-center justify-between bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
        <div class="flex flex-col ">

            <flux:heading size="xl" level="1">Organization Structure</flux:heading>
            <flux:text class=" mt-1 text-base">Manage clearance units, faculties, departments, and hostels
            </flux:text>
        </div>

        <div>


            <x-modals.add-unit/>
        </div>


    </div>

    <div
        class="w-full flex justify-between text-left rounded-2xl border transition-all p-6 border-violet-200 bg-gradient-to-r from-violet-600 to-purple-700 shadow-lg shadow-violet-200">
        <div class="flex gap-3">
            <div class="rounded-full flex justify-center  px-5 py-2 bg-white/20 items-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 22V4C6 3.46957 6.21071 2.96086 6.58579 2.58579C6.96086 2.21071 7.46957 2 8 2H16C16.5304 2 17.0391 2.21071 17.4142 2.58579C17.7893 2.96086 18 3.46957 18 4V22H6Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M6 12H4C3.46957 12 2.96086 12.2107 2.58579 12.5858C2.21071 12.9609 2 13.4696 2 14V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H6"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M18 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H18"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 6H14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 10H14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 14H14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 18H14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <div class="flex flex-col gap-1">
                <h1 class="font-black text-white text-3xl">6</h1>
                <p class="text-white">Clearance Units</p>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <h1 class="font-black text-white text-3xl">5</h1>
            <p class="text-white">Active Officers</p>
        </div>
    </div>

    <div class="flex w-full  gap-4 ">


        <x-unit-management-card heading="Faculties" subheading="Top-level academic bodies" count="6">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.8503 9.10168C17.9995 9.03587 18.1261 8.92774 18.2144 8.79068C18.3028 8.65363 18.3489 8.49367 18.3473 8.33063C18.3456 8.16758 18.2961 8.00862 18.2049 7.87342C18.1138 7.73822 17.985 7.63273 17.8345 7.57001L10.692 4.31668C10.4749 4.21764 10.239 4.16638 10.0003 4.16638C9.76166 4.16638 9.52579 4.21764 9.30865 4.31668L2.16699 7.56668C2.01863 7.63166 1.89242 7.73846 1.80379 7.87403C1.71517 8.00959 1.66797 8.16805 1.66797 8.33001C1.66797 8.49198 1.71517 8.65043 1.80379 8.786C1.89242 8.92157 2.01863 9.02837 2.16699 9.09335L9.30865 12.35C9.52579 12.4491 9.76166 12.5003 10.0003 12.5003C10.239 12.5003 10.4749 12.4491 10.692 12.35L17.8503 9.10168Z"
                    stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18.333 8.33337V13.3334" stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path
                    d="M5 10.4166V13.3333C5 13.9963 5.52678 14.6322 6.46447 15.1011C7.40215 15.5699 8.67392 15.8333 10 15.8333C11.3261 15.8333 12.5979 15.5699 13.5355 15.1011C14.4732 14.6322 15 13.9963 15 13.3333V10.4166"
                    stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </x-unit-management-card>

        <x-unit-management-card heading="Departments" subheading="Grouped under faculties" count="12">

            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_650_113)">
                    <path
                        d="M10.692 1.81668C10.4749 1.71764 10.239 1.66638 10.0004 1.66638C9.76172 1.66638 9.52585 1.71764 9.30871 1.81668L2.16704 5.06668C2.01917 5.13188 1.89344 5.23868 1.80518 5.37406C1.71692 5.50944 1.66992 5.66757 1.66992 5.82918C1.66992 5.99079 1.71692 6.14892 1.80518 6.2843C1.89344 6.41968 2.01917 6.52648 2.16704 6.59168L9.31704 9.85001C9.53418 9.94905 9.77005 10.0003 10.0087 10.0003C10.2474 10.0003 10.4832 9.94905 10.7004 9.85001L17.8504 6.60001C17.9983 6.53481 18.124 6.42801 18.2122 6.29263C18.3005 6.15725 18.3475 5.99913 18.3475 5.83751C18.3475 5.6759 18.3005 5.51777 18.2122 5.38239C18.124 5.24701 17.9983 5.14022 17.8504 5.07501L10.692 1.81668Z"
                        stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M1.66699 10C1.6666 10.1594 1.71192 10.3155 1.79759 10.45C1.88326 10.5844 2.00568 10.6914 2.15033 10.7583L9.31699 14.0167C9.533 14.1145 9.76738 14.1651 10.0045 14.1651C10.2416 14.1651 10.476 14.1145 10.692 14.0167L17.842 10.7667C17.9895 10.7004 18.1145 10.5926 18.2018 10.4564C18.2891 10.3203 18.3349 10.1617 18.3337 10"
                        stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M1.66699 14.1666C1.6666 14.326 1.71192 14.4822 1.79759 14.6166C1.88326 14.751 2.00568 14.858 2.15033 14.925L9.31699 18.1833C9.533 18.2811 9.76738 18.3317 10.0045 18.3317C10.2416 18.3317 10.476 18.2811 10.692 18.1833L17.842 14.9333C17.9895 14.867 18.1145 14.7592 18.2018 14.6231C18.2891 14.4869 18.3349 14.3283 18.3337 14.1666"
                        stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_650_113">
                        <rect width="20" height="20" fill="white"/>
                    </clipPath>
                </defs>
            </svg>


        </x-unit-management-card>

        <x-unit-management-card heading="Hostels" subheading="Residential Accommodation" count="7">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.5 17.5V10.8333C12.5 10.6123 12.4122 10.4004 12.2559 10.2441C12.0996 10.0878 11.8877 10 11.6667 10H8.33333C8.11232 10 7.90036 10.0878 7.74408 10.2441C7.5878 10.4004 7.5 10.6123 7.5 10.8333V17.5"
                    stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path
                    d="M2.5 8.33335C2.49994 8.0909 2.55278 7.85137 2.65482 7.63144C2.75687 7.41152 2.90566 7.21651 3.09083 7.06001L8.92417 2.06085C9.22499 1.8066 9.60613 1.66711 10 1.66711C10.3939 1.66711 10.775 1.8066 11.0758 2.06085L16.9092 7.06001C17.0943 7.21651 17.2431 7.41152 17.3452 7.63144C17.4472 7.85137 17.5001 8.0909 17.5 8.33335V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0119C16.6993 17.3244 16.2754 17.5 15.8333 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0119C2.67559 16.6993 2.5 16.2754 2.5 15.8333V8.33335Z"
                    stroke="#6A7282" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>


        </x-unit-management-card>

    </div>

    <x-unit-management-table>
        <x-slot:options>
            <div class="flex justify-between">

                <x-search/>
                <p class="text-[#6A7282]">{{$unitData->count()}} results</p>
            </div>
        </x-slot:options>


        <x-slot:header>

            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Unit</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Type</th>
            {{--            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Department</th>--}}
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Officers</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Request/MO</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Status</th>
        </x-slot:header>

        @foreach($unitData as $unit)

            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex gap-4 ">
{{--                        @dd()--}}
                        <x-icons.unit-icon :color="UnitType::accent($unit->type)" />
                        <div class="flex items-center">
                            <span
                                class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">{{$unit->name}}</span>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <x-badge :value="$unit->type" :color="UnitType::accent($unit->type)"/>
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

                <td class="px-6 py-4">
                    <x-status-badge :status="$unit->status" :classes="$unit->status == 'active'? ['dot'=> 'bg-green-500',
                                                                                          'bg' => 'bg-green-100',
                                                                                           'text' => 'text-green-500'
                                                                                           ]:
                                                                                           ['dot'=> 'bg-red-500',
                                                                                          'bg' => 'bg-red-100',
                                                                                           'text' => 'text-red-500'
                                                                                           ]
                                                                                           "/>
                </td>
            </tr>

        @endforeach


    </x-unit-management-table>
</div>

