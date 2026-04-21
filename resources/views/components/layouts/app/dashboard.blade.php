@props(
[
    'unit' =>'unpassed'
    ])

<div class="bg-background">
    <flux:heading size="xl" level="1">Good afternoon, {{$unit}} officer </flux:heading>
    <flux:text class="mb-6 mt-2 text-base">Do your Fucking Work!!</flux:text>

    <div class="flex gap-4 w-full">

        <x-card title="Total Requests" value="1,420"  class="border-l-blue-400">
            <x-icons.total />
        </x-card>

        <x-card title="Approved Requests" value="540"  class="border-l-green-500">
            <x-icons.approved />
        </x-card>

        <x-card title="Pending Review" value="420"  icon="pending" class="border-l-yellow-500">
            <x-icons.pending />
        </x-card>

        <x-card title="Queried Requests" value="20"  icon="pending" class="border-l-red-500">
            <x-icons.rejected />
        </x-card>

    </div>

    <div class="relative flex-1 overflow-hidden mt-8 ">
        <div class="w-full gap-6 grid xl:grid-cols-4 lg:grid-cols-5 grid-cols-2 ">
            <div
                class="w-full  xl:col-span-1 lg:col-span-2 col-span-1 border shadow-sm border-gray-200 bg-white  dark:border-white/10 rounded-xl p-4 flex flex-col justify-between">
                <div class="w-full flex items-center justify-between text-xl dark:text-zinc-400 font-semibold">
                    <h3>Clearance Status</h3>
                    <span>1420</span>
                </div>
                <div class="w-full flex justify-center items-center">
                    <div
                        class="relative 2xl:h-[280px] 2xl:w-[280px] lg:h-[230px] lg:w-[230px] mt-8 flex justify-center items-center">
                        <canvas id="status-chart"></canvas>
                    </div>

                </div>
            </div>

            <div class="w-full bg-white border border-gray-200 shadow-sm  dark:border-white/10 rounded-xl p-4 flex flex-col lg:col-span-3 col-span-1">
                <div class="w-full flex justify-between items-center">
                    <h3 class="font-semibold text-xl dark:text-zinc-400">Announcements</h3>
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


        <div class="bg-white border border-gray-100 rounded-2xl mt-8 shadow-sm">
            <div class="px-8 py-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">Recent Requests</h2>
                        <p class="text-sm text-gray-500 mt-1">Manage and review student clearances</p>
                    </div>
                    <button class="flex items-center gap-2 px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50">
                        <SlidersHorizontal class="w-4 h-4" />
                        Filters
                    </button>
                </div>
            </div>



        <div class="divide-y divide-gray-50">

            <div  class="px-8 py-6 hover:bg-gray-50/50 transition-colors">
                <div class="flex items-center gap-6">
                    <div
                        class="bg-primary text-white font-bold rounded-full image-fit zoom-in mr-1 h-12 w-12 flex items-center justify-center">
                        <span>JD</span>
                    </div>

                    <div class="flex-1 min-w-0 grid grid-cols-4 gap-6">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <div class="font-medium text-gray-900">John Doe</div>
                                <AlertCircle class="w-4 h-4 text-orange-500" />
                            </div>
                            <div class="text-sm text-gray-500">CSC/2000/1002</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-500 mb-1">Course</div>
                            <div class="text-sm text-gray-900">Computer Science</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-500 mb-1">Status</div>
                            <div class="text-sm text-gray-900">tag</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-500 mb-1">Submitted</div>
                            <div class="text-sm text-gray-900">12/02/2000</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 shrink-0">

                        <button class="px-4 py-2 bg-violet-600 text-white text-sm rounded-lg hover:bg-violet-700 transition-colors">
                            Review
                        </button>

                </div>
            </div>
        </div>

        </div>
    </div>
    </div>

        <div class="px-8 py-5 border-t border-gray-100 bg-gray-50/50">
            <button class="text-sm text-violet-600 font-medium hover:text-violet-700">
                View all 280 requests →
            </button>
        </div>



</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const chart = document.getElementById('status-chart');

    new Chart(chart, {
        type: "doughnut",
        data: {
            labels: ['Active', 'Pending', 'Rejected'],
            datasets: [{
                data: [10, 30, 30],
                backgroundColor: ['#039855', '#EEA23E', '#E33B32'],
                hoverBackgroundColor: ['#039855', '#EEA23E', '#E33B32'],
                borderWidth: 0
            }]
        },
        options: {
            cutout: "50%",
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'circle',
                        padding: 12,
                        font: {
                            size: 14
                        },
                        color: '#666',
                        boxWidth: 6,
                        boxHeight: 6
                    }
                }
            }

        }
    });
</script>
