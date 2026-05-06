<div @approve-request.window=" $wire.approveRequest()"
     @reject-request.window=" $wire.rejectRequest($event.detail.remarks) "
        @change-sort-value.window=" $wire.sortChange($event.detail.value) "
>

    <div class="mt-8">
        <h1 class="text-gray-900 text-3xl font-semibold mb-6">Pending Requests</h1>
        <div class="min-h-screen ">
            <div class=" mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex gap-2 mb-6">
                        <button

                            class="px-4 py-2 rounded-lg text-sm flex items-center gap-2 bg-gradient-to-r from-primary to-secondary text-white">
                            New Applications

                            <span class="bg-purple-500 text-white text-xs px-2 py-0.5 rounded-full">{{$pending_requests->count()}}</span>

                        </button>
                        <button
                            class="px-4 py-2 rounded-lg text-sm flex items-center gap-2 bg-white text-gray-700 border border-gray-200"
                        >
                            Reapplications
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full">3</span>
                        </button>
                    </div>


                </div>


                <div class="flex items-center justify-between mb-6">
                    <div class="relative w-64">
                        <x-search />
                    </div>
                    <div class="relative" x-data="{ open: false, value: 'newest' }">

                        <button @click="open = !open" class="flex items-center gap-2 text-sm text-gray-700 border rounded-full p-3 border-gray-300">
                            Filter by:{{$this->sortValue}}
                        </button>

                        <div x-cloak x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded border-gray-300 shadow-lg z-10">
                            <ul>
                                <li @click.prevent=" open = false; $dispatch('change-sort-value', {value: 'Name'})" class="px-4 py-2 hover:bg-gray-100 cursor-pointer border-b border-gray-300">Name</li>
                                <li @click.prevent=" open = false; $dispatch('change-sort-value', {value: 'Newest'})"  class="px-4 py-2 hover:bg-gray-100 cursor-pointer border-b border-gray-300">Newest</li>
                                <li @click.prevent=" open = false; $dispatch('change-sort-value', {value: 'Oldest'})" class="px-4 py-2 hover:bg-gray-100 cursor-pointer  border-b border-gray-300">Oldest</li>
                                <li @click.prevent=" open = false; $dispatch('change-sort-value', {value: 'Course'})" class="px-4 py-2 hover:bg-gray-100 cursor-pointer border-b border-gray-300">Course</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-[#2D2855] to-[#4A2A4F] text-white">
                        <tr>
                            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Student Name</th>
                            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Matric No.</th>
                            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Course</th>
                            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Submitted</th>
                            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Status</th>
                            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($pending_requests as $request)

                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1">
                                    <div
                                        class="bg-gradient-to-r from-[#2D2855] to-secondary  text-white font-bold rounded-full image-fit zoom-in mr-4 h-12 w-12 flex items-center justify-center">
                                        <span>JD</span>
                                    </div>
                                    <span class="text-sm text-gray-900">{{$request->name}}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{$request->matric_no}}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$request->course}}</div>
                                <div class="text-xs text-gray-500">{{$request->department}}</div>
                            </td>


                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-700 ">
                                    {{$request->created_at->format('F j, Y') }}

                                </div>
                                <div class="text-xs text-gray-500" >
                                    {{$request->created_at->format('g:i A')}}
                                </div>

                            </td>
                            <td class="px-6 py-4">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs capitalize">
                        <x-tag :status="$request->clearanceForUnit(user()->unit_id)->status->label()" :classes="$request->clearanceForUnit(user()->unit_id)->status->classes()" />
                    </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">

                                    <button type="button" wire:click="openModal('student-contact', {{ $request->id }})" class=" flex justify-center items-center w-9 h-9 border rounded-[10px] hover:bg-gray-100 border-[#E0DCD4]">
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.666748 2.66675L5.92675 6.17342C6.14586 6.3196 6.40335 6.39761 6.66675 6.39761C6.93015 6.39761 7.18764 6.3196 7.40675 6.17342L12.6667 2.66675M2.00008 10.0001H11.3334C11.687 10.0001 12.0262 9.85961 12.2762 9.60956C12.5263 9.35951 12.6667 9.02037 12.6667 8.66675V2.00008C12.6667 1.64646 12.5263 1.30732 12.2762 1.05727C12.0262 0.807224 11.687 0.666748 11.3334 0.666748H2.00008C1.64646 0.666748 1.30732 0.807224 1.05727 1.05727C0.807224 1.30732 0.666748 1.64646 0.666748 2.00008V8.66675C0.666748 9.02037 0.807224 9.35951 1.05727 9.60956C1.30732 9.85961 1.64646 10.0001 2.00008 10.0001Z" stroke="#666666" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>


                                        <button  wire:click="openModal('view-request', {{ $request->id }})" class=" items-center justify-center gap-2 inline-flex px-4 py-1.5 bg-gradient-to-r from-primary to-secondary text-white text-sm rounded-lg hover:bg-purple-700">
                                            <svg
                                                class="w-4 h-4 text-gray-600"
                                                fill="none"
                                                stroke="white"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    strokeLinecap="round"
                                                    strokeLinejoin="round"
                                                    strokeWidth={2}
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                />
                                                <path
                                                    strokeLinecap="round"
                                                    strokeLinejoin="round"
                                                    strokeWidth={2}
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                />
                                            </svg>
                                            Review
                                        </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{--          TODO: PAGINATION--}}

            </div>
        </div>

    </div>

    <x-modals.student-contact />
    <x-modals.view-request />
    <x-modals.rejection-confirmation  />
    <x-modals.officer-confirmation />

</div>
