<div class="">

    @section('content')

        <h1 class="font-semibold text-4xl  !text-black my-8">
            Welcome to the Student Dashboard!!
        </h1>

        <div class="flex flex-col p-5 gap-5 bg-white border border-primary-border rounded-[20px]">
            <div>
                <h2 class="font-semibold text-2xl">Clearance Status By Units</h2>
                <p class="text-[#93979D] font-medium text-base">Track your clearance progress across all department</p>
            </div>

            <div class="flex w-full gap-6.5">
                <x-student-card title="Library" />
                <x-student-card title="Dsa" />
                <x-student-card title="Health Center"/>
                <x-student-card title="Hostel"/>
            </div>

        </div>

        @if(!$registered)
            <div class="bg-white mt-6 border rounded-2xl p-5 border-primary-border">
                <h2 class="font-semibold text-2xl">Submit Clearance Request</h2>
                <p class="text-[#93979D] font-medium text-base">Upload necessary documents for clearance</p>

                <div class="flex flex-col gap-5 justify-center items-center">
                    <div>
                        <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_136_250)">
                                <rect width="200" height="200" fill="#1D1B20" fill-opacity="0.08"/>
                                <path d="M245 100.062V205.405C245 213.466 238.036 220 229.444 220H35C35 145.442 99.4212 85 178.889 85C202.724 85 225.205 90.4372 245 100.062Z" fill="#1D1B20" fill-opacity="0.08"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_136_250">
                                    <rect width="200" height="200" rx="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                    </div>
                    <div class="flex flex-col gap-1 text-base text-center ">
                        <p class="font-semibold">No Registration here</p>
                        <p class="text-[#93979D]">Start the clearance process by clicking on the “Fill clearance Form” button.</p>
                    </div>

                    <a href="#"  class="  bg-linear-to-r text-center from-[#4B3BE4] to-[#A70088] text-white px-60 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 ">
                        Fill Clearance Form
                    </a>

                </div>
            </div>
        @else
            <div class="grid grid-cols-3 gap-8.5 mt-4">
                <div class="col-span-1 bg-white px-5 py-3 rounded-[20px] shadow-sm border border-gray-200">
                    <h2 class="font-semibold text-2xl">Student Profile</h2>
                    <p class="text-[#6C767D] font-medium text-base bg-white">Academic and clearance details</p>

                    <div class="flex flex-col gap-5 mt-5">
                        <div class="flex justify-between mt-5 w-full pb-1 border-b border-gray-200">
                            <p class="text-[#6C767D] font-medium text-[14px]">Matric No.</p>
                            <p class="text-black text-[14px]">CSC/2000/100</p>
                        </div>

                        <div class="flex justify-between mt-5 w-full pb-1 border-b border-gray-200">
                            <p class="text-[#6C767D] font-medium text-[14px]">Department</p>
                            <p class="text-black text-[14px]">Mechanical Engineering</p>
                        </div>

                        <div class="flex justify-between mt-5 w-full pb-1 border-b border-gray-200">
                            <p class="text-[#6C767D] font-medium text-[14px]">Faculty</p>
                            <p class="text-black text-[14px]">Technology</p>
                        </div>

                        <div class="flex justify-between mt-5 w-full pb-1 border-b border-gray-200">
                            <p class="text-[#6C767D] font-medium text-[14px]">Level</p>
                            <p class="text-black text-[14px]">500</p>
                        </div>

                        <div class="flex justify-between mt-5 w-full pb-1 border-b border-gray-200">
                            <p class="text-[#6C767D] font-medium text-[14px]">Overall</p>
                            <x-tag/>
                        </div>
                    </div>

                    <div class="flex justify-center my-5 items-center ">

                        <a href="#"  class="bg-linear-to-r text-center from-[#4B3BE4] to-[#A70088] text-white px-8 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 ">
                            Generate certificate
                        </a>
                    </div>

                </div>

                <div class="col-span-2 ">
                    <div class="w-full bg-white border border-gray-200 shadow-sm  dark:border-white/10 rounded-xl p-4 flex flex-col lg:col-span-3 col-span-1">
                        <div class="w-full flex justify-between items-center">
                            <h3 class="font-semibold text-xl dark:text-zinc-400">Action Required</h3>
                            <button class="text-[#667085] dark:text-zinc-400">View all</button>
                        </div>

                        <div class="w-full grid grid-cols-1 gap-4 mt-12 max-h-64 overflow-y-auto scrollbar-none">
                            <x-action-card title="Global Marketing" description="Subscription expires in 3 days" size="High"
                                           sizeBg="bg-[#E33B32]" />
                            <x-action-card title="Product Launch" description="Subscription expires in 5 days" size="Medium"
                                           sizeBg="bg-[#EEA23E]" />
                            <x-action-card title="Customer Support" description="Subscription expires in 10 days" size="Low"
                                           sizeBg="bg-[#039855]" />
                        </div>
                    </div>

                </div>
            </div>
        @endif
    @endsection

</div>
