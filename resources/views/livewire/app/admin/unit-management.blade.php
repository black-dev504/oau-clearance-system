<div class="flex flex-col gap-6">
    <div
        class=" flex items-center justify-between bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
        <div class="flex flex-col ">

            <flux:heading size="xl" level="1">Organization Structure</flux:heading>
            <flux:text class=" mt-1 text-base">Manage clearance units, faculties, departments, and hostels
            </flux:text>
        </div>

        <flux:modal.trigger name="add-announcement">
            <button class="px-3 py-2 bg-primary text-white rounded-xl whitespace-nowrap">+ New Announcement</button>
        </flux:modal.trigger>


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
            <p class="text-white">Active Units</p>
        </div>
    </div>

    <div class="flex w-full  gap-4 ">

        <div class="flex flex-col w-full p-5 bg-white border-gray-200 border rounded-2xl ">

            <div class="flex gap-3">
                <div class="rounded-full p-3.5 flex items-center justify-center bg-[#F3F4F6]">
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

                </div>
                <h1 class="font-black text-black text-3xl">6</h1>

            </div>
            <h1 class="font-medium text-base">Faculties</h1>
            <flux:text class="text-base">Top-level academic bodies</flux:text>
        </div>

        <div class=" flex flex-col w-full p-5 bg-white border-gray-200 border rounded-2xl ">

            <div class="flex gap-3">
                <div class="rounded-full p-3.5 flex items-center justify-center bg-[#F3F4F6]">
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
                </div>
                <h1 class="font-black text-black text-3xl">6</h1>

            </div>
            <h1 class="font-medium text-base">Faculties</h1>
            <flux:text class="text-base">Top-level academic bodies</flux:text>
        </div>


        <div class="flex flex-col w-full p-5 bg-white border-gray-200 border rounded-2xl ">

            <div class="flex gap-3">
                <div class="rounded-full p-3.5 flex items-center justify-center bg-[#F3F4F6]">
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
                </div>
                <h1 class="font-black text-black text-3xl">6</h1>

            </div>
            <h1 class="font-medium text-base">Faculties</h1>
            <flux:text class="text-base">Top-level academic bodies</flux:text>
        </div>
    </div>

        <div class="bg-white intro-y overflow-auto  dark:bg-zinc-800 dark:border-white/10 border border-gray-100 rounded-2xl mt-8 shadow-sm dark:shadow-none">
            <div class="px-8 py-6 border-b dark:border-white/10 border-gray-100">
                <div class="flex items-center justify-between">
                    <x-search/>
                    <p class="text-[#6A7282]">6 results</p>
                </div>
            </div>

        <table class=" w-full">
            <thead class="bg-[#F3F4F6] text-[#6A7282] px-6 py-3 w-full">
            <tr >
                <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Unit</th>
                <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Type</th>
                <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Department</th>
                <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Officer</th>
                <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Request/MO</th>
                <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Status</th>
            </tr>
            </thead>


            <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex gap-4 ">
                        <x-icons.unit-icon class="text-purple-500" />
                        <div class="flex items-center">
                        <span class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">Library</span>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <x-tag status="Library"/>
                </td>

                <td class=" px-6 py-4 ">
                   -
                </td>

                <td class="px-6 py-4">
                   John Kamara
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
                  <x-tag status="Active" />
                </td>
            </tr>


            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex gap-4 ">
                        <x-icons.unit-icon class="text-purple-500" />
                        <div class="flex items-center">
                        <span class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">Library</span>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <x-tag status="Library"/>
                </td>

                <td class=" px-6 py-4 ">
                   -
                </td>

                <td class="px-6 py-4">
                   John Kamara
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
                  <x-tag status="Active" />
                </td>
            </tr>

            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex gap-4 ">
                        <x-icons.unit-icon class="text-purple-500" />
                        <div class="flex items-center">
                            <span class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">Library</span>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <x-tag status="Library"/>
                </td>

                <td class=" px-6 py-4 ">
                    -
                </td>

                <td class="px-6 py-4">
                    John Kamara
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
                    <x-tag status="Active" />
                </td>
            </tr>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex gap-4 ">
                        <x-icons.unit-icon class="text-purple-500" />
                        <div class="flex items-center">
                            <span class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">Library</span>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <x-tag status="Library"/>
                </td>

                <td class=" px-6 py-4 ">
                    -
                </td>

                <td class="px-6 py-4">
                    John Kamara
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
                    <x-tag status="Active" />
                </td>
            </tr>





            </tbody>
        </table>
        </div>
</div>

