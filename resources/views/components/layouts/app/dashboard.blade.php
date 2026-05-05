@props(
[
    'unit' =>'unpassed',
    'data' => [],
    'chartData' => [],
    'recentRequests' => []
    ])

<div wire:navigate class="bg-background">
    <flux:heading size="xl" level="1">Good afternoon, {{$unit}} officer </flux:heading>
    <flux:text class="mb-6 mt-2 text-base">Do your Fucking Work!!</flux:text>

    <div class="flex gap-4 w-full">

        <x-card title="Total Requests" :value="$data['total']"  class="border-l-blue-400">
            <x-icons.total />
        </x-card>

        <x-card title="Approved Requests" :value="$data['approved']" class="border-l-green-500">
            <x-icons.approved />
        </x-card>

        <x-card title="Pending Review" :value="$data['pending']"  icon="pending" class="border-l-yellow-500">
            <x-icons.pending />
        </x-card>

        <x-card title="Queried Requests" :value="$data['rejected']"  icon="pending" class="border-l-red-500">
            <x-icons.rejected />
        </x-card>

    </div>

    <div class="relative flex-1 overflow-hidden mt-8 ">
        <div class="w-full gap-6 grid xl:grid-cols-4 lg:grid-cols-5 grid-cols-2 ">
            <div
                class="w-full  xl:col-span-1 lg:col-span-2 col-span-1 border shadow-sm border-gray-200 bg-white  dark:border-white/10 rounded-xl p-4 flex flex-col justify-between">
                <div class="w-full flex items-center justify-between text-xl dark:text-zinc-400 font-semibold">
                    <h3>Clearance Status</h3>
                    <span>{{$data['total']}}</span>
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

                    @foreach($recentRequests as $request)
            <div  class="px-8 py-6 hover:bg-gray-50/50 transition-colors">
                <div class="flex items-center gap-6">
                    <div
                        class="bg-gradient-to-br from-primary to-secondary text-white font-bold rounded-full image-fit zoom-in mr-1 h-12 w-12 flex items-center justify-center">
                        <span>JD</span>
                    </div>


                        <div class="flex-1 min-w-0 grid grid-cols-4 gap-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="font-medium text-gray-900">{{$request->name}}</div>
                                </div>
                                <div class="text-sm text-gray-500">{{$request->matric_no}}</div>
                            </div>

                            <div>
                                <div class="text-sm text-gray-500 mb-1">Course</div>
                                <div class="text-sm text-gray-900">{{$request->course}} </div>
                            </div>

                            <div >
                                <div class="text-sm text-gray-500 mb-1 pl-3">Status</div>
                                <div class="text-sm text-gray-900">
                                    <x-tag :status="$request->status->label()" :classes="$request->status->classes()" />
                                </div>
                            </div>

                            <div>
                                <div class="text-sm text-gray-500 mb-1">Submitted</div>
                                <div class="text-sm text-gray-900">{{ $request->created_at->diffForHumans()}}</div>
                            </div>
                        </div>

                    <div class="flex items-center gap-3 shrink-0">
                        <flux:modal.trigger name="student-contact">
                            <button class=" flex justify-center items-center w-9 h-9 border rounded-[10px] hover:bg-gray-100 border-[#E0DCD4]">
                                <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.666748 2.66675L5.92675 6.17342C6.14586 6.3196 6.40335 6.39761 6.66675 6.39761C6.93015 6.39761 7.18764 6.3196 7.40675 6.17342L12.6667 2.66675M2.00008 10.0001H11.3334C11.687 10.0001 12.0262 9.85961 12.2762 9.60956C12.5263 9.35951 12.6667 9.02037 12.6667 8.66675V2.00008C12.6667 1.64646 12.5263 1.30732 12.2762 1.05727C12.0262 0.807224 11.687 0.666748 11.3334 0.666748H2.00008C1.64646 0.666748 1.30732 0.807224 1.05727 1.05727C0.807224 1.30732 0.666748 1.64646 0.666748 2.00008V8.66675C0.666748 9.02037 0.807224 9.35951 1.05727 9.60956C1.30732 9.85961 1.64646 10.0001 2.00008 10.0001Z" stroke="#666666" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </flux:modal.trigger>

                        <flux:modal.trigger name="view-request">

                        <button wire:click="openModal({{$request->id}})" class="px-4 py-2 bg-primary text-white text-sm rounded-lg hover:bg-violet-700 transition-colors">
                            Review
                        </button>
                        </flux:modal.trigger>
                    </div>

                </div>
            </div>
                    @endforeach
        </div>

        </div>
    </div>
    </div>

        <div class="px-8 py-5 border-t border-gray-100 bg-gray-50/50">
            <button class="text-sm text-violet-600 font-medium hover:text-violet-700">
                View all 280 requests →
            </button>
        </div>


<x-modals.student-contact />
<x-modals.view-request />
<x-modals.rejection-confirmation />
<x-modals.student-confirmation />


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    window.addEventListener('updateChart', (event) => {
        const {
            approved,
            pending,
            rejected
        } = event.detail;
        updateChart(approved, pending, rejected);
        console.log('update');
    })

    let statusChart;
    let approved = {{ $chartData['approved'] }};
    let pending = {{ $chartData['pending']  }};
    let rejected = {{ $chartData['suspended']  }};


    createChart(approved, pending, rejected);

     function createChart($approved, $pending, $rejected)
     {
         statusChart = new Chart(document.getElementById('status-chart'), {
             type: "doughnut",
             data: {
                 labels: ['Approved', 'Pending', 'Rejected'],
                 datasets: [{
                     data: [$approved, $pending, $rejected],
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
    }

    function updateChart($approved, $pending, $rejected)
    {
        if (statusChart) {
           $statusChart.destroy();
        }
        createChart($approved, $pending, $rejected);

    }
</script>
