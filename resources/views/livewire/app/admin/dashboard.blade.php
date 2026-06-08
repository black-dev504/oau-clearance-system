<div class="bg-background dark:text-zinc-400 dark:bg-zinc-800 rounded-xl overscroll-y-contain">
{{--    <flux:heading size="xl" level="1">Good afternoon, {{$unit->name}} officer </flux:heading>--}}
{{--    <flux:text class="mb-6 mt-2 text-base">Do your Fucking Work!!</flux:text>--}}

    <div class="auto-rows-min grid md:grid-cols-4 gap-4 w-full">

        <x-card title="Total Requests" :value="$total_requests"   class=" ">
            <x-icons.total />
        </x-card>

        <x-card title="Active Units" :value="$total_units" class=" ">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6 text-emerald-500"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="1">
                <rect x="4" y="2" width="18" height="20" rx="0.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="9" y="5" width="2" height="3" rx="0.5"/>
                <rect x="16" y="5" width="2" height="3" rx="0.5"/>
                <rect x="9" y="10" width="2" height="3" rx="0.5"/>
                <rect x="16" y="10" width="2" height="3" rx="0.5"/>
                <rect x="12" y="18" width="4" height="4" rx="0.5"/>
            </svg>
        </x-card>

        <x-card title="Total Officers" :value="$total_officers"   class="">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6 text-yellow-700"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4 20a8 8 0 0116 0" />
            </svg>
        </x-card>

        <x-card title="Overall Approval Rate"  value="98%" class="!bg-green-200 !text-white">
            <x-icons.rejected />
        </x-card>

    </div>

    <div class="relative flex-1 overflow-hidden mt-8 ">
        <div class="w-full gap-6 grid xl:grid-cols-4 lg:grid-cols-5 grid-cols-1 ">
            <div class="w-full dark:bg-zinc-800 xl:col-span-1 lg:col-span-2 col-span-1 border shadow-sm border-gray-200 bg-white  dark:border-white/10 rounded-xl flex flex-col justify-between">
                <div class="w-ful border-b  p-4 border-b-gray-200 dark:border-white/10 flex  flex-col  text-xl dark:text-zinc-100 font-semibold">
                    <h3 class="dark:text-zinc-100">Pending Requests by Unit</h3>
                    <span class="text-sm text-gray-400 dark:text-zinc-400">pending requests across all units</span>
                </div>
                <div class="w-full flex  pb-4 justify-center items-center">
                    <div
                        class="relative 2xl:h-[280px] 2xl:w-[280px] lg:h-[230px] lg:w-[230px] mt-8 flex justify-center items-center">
                        <canvas id="status-chart"></canvas>
                    </div>

                </div>
            </div>

            <div class="w-full dark:bg-zinc-800 bg-white border border-gray-200 shadow-sm  dark:border-white/10 rounded-xl p-4 flex flex-col lg:col-span-3 col-span-1">
                <div class="w-full flex flex-col border-b dark:border-white/10  border-gray-200 pb-4 justify-between items-start">
                    <h3 class="font-semibold text-xl dark:text-zinc-100">Unit Performance</h3>
                    <h3 class="text-gray-400 text-sm dark:text-zinc-400">Efficiency metric for each unit</h3>
                </div>

                <div class="w-full grid grid-cols-1 gap-4 mt-12 max-h-64 overflow-y-auto scrollbar-none">

                    @foreach($units_metrics as $unit)
                        <x-unit-performance-card :unitName="$unit['name']" :processed_requests="$unit['metric']['processed']" :approval_rate="$unit['metric']['approval_rate']"/>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="bg-white intro-y overflow-auto  dark:bg-zinc-800 dark:border-white/10 border border-gray-100 rounded-2xl mt-8 shadow-sm dark:shadow-none">
            <div class="px-8 py-6 border-b dark:border-white/10 border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold dark:text-zinc-100 text-gray-900">Recent Clearance Requests</h2>
                        <p class="text-sm text-gray-500 dark:text-zinc-400  mt-1">clearance requests across all units</p>
                    </div>

                </div>
            </div>

            <table class="w-full dark:border-white/10 dark:border">
                <tbody class=" dark:bg-zinc-800 divide-y divide-gray-50 dark:divide-white/10">

                @if($recentRequests->count() > 0)

                    @foreach($recentRequests as $request)
                        <tr wire:key="request-{{ $request->id }}" class="overflow-auto px-8 py-6 dark:hover:bg-zinc-700 hover:bg-gray-50/50 transition-colors">

                            <td class=" w-auto px-6 py-4">
                                <div class="flex gap-3">
                                    <div
                                        class="bg-gradient-to-br from-primary to-secondary text-white font-bold rounded-full image-fit zoom-in mr-1 h-12 w-12 flex items-center justify-center">
                                        <span>{{get_initials($request->name)}}</span>
                                    </div>


                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <div class="font-medium text-gray-900 dark:text-zinc-100">{{$request->name}}</div>
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-zinc-400">{{$request->matric_no}}</div>
                                    </div>
                                </div>
                            </td>

                            <td class=" w-auto px-6 py-4">
                                <div>
                                    <div class="text-sm text-gray-500 mb-1 dark:text-zinc-400">Course</div>
                                    <div class="text-sm text-gray-900 dark:text-zinc-100">{{$request->course}} </div>
                                </div>
                            </td>


                            <td class=" w-auto px-6 py-4">
                                <div >
                                    <div class="text-sm text-gray-500 mb-1 pl-3 dark:text-zinc-400">Status</div>
                                    <div class="text-sm text-gray-900">
                                        @if(user()->hasRole('officer'))
                                            {{--                            show individual clearance status--}}
                                            <x-tag :status="$request->clearanceForUnit(user()->unit_id)?->status->label()" :classes="$request->clearanceForUnit(user()->unit_id)?->status->classes()" />
                                        @else
                                            {{--                            show overall clearance status--}}
                                            <x-tag :status="$request->status->label()" :classes="$request->status->classes()" />
                                        @endif                                    </div>
                                </div>
                            </td>

                            <td class=" w-auto px-6 py-4">

                                <div>
                                    <div class="text-sm text-gray-500 mb-1 dark:text-zinc-400">Submitted</div>
                                    <div class="text-sm text-gray-900 dark:text-zinc-100">{{ $request->created_at->diffForHumans()}}</div>
                                </div>
                            </td>

                            <td class=" w-auto px-6 py-4">

                                <div class="flex items-center gap-3 shrink-0">
                                    <button type="button" wire:click="openModal('student-contact', {{ $request->id }})" class="cursor-pointer flex justify-center items-center w-9 h-9 border rounded-[10px] hover:bg-gray-100 dark:border-white/10  border-[#E0DCD4]">
                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.666748 2.66675L5.92675 6.17342C6.14586 6.3196 6.40335 6.39761 6.66675 6.39761C6.93015 6.39761 7.18764 6.3196 7.40675 6.17342L12.6667 2.66675M2.00008 10.0001H11.3334C11.687 10.0001 12.0262 9.85961 12.2762 9.60956C12.5263 9.35951 12.6667 9.02037 12.6667 8.66675V2.00008C12.6667 1.64646 12.5263 1.30732 12.2762 1.05727C12.0262 0.807224 11.687 0.666748 11.3334 0.666748H2.00008C1.64646 0.666748 1.30732 0.807224 1.05727 1.05727C0.807224 1.30732 0.666748 1.64646 0.666748 2.00008V8.66675C0.666748 9.02037 0.807224 9.35951 1.05727 9.60956C1.30732 9.85961 1.64646 10.0001 2.00008 10.0001Z" stroke="#666666" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>

                                    <button type="button"  wire:click="openModal('view-request', {{ $request->id }})" class="cursor-pointer px-4 py-2 bg-primary text-white text-sm rounded-lg hover:bg-violet-700 transition-colors">
                                        Review
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @else

                    <div class="flex flex-col items-center justify-center py-12">
                        <x-icons.table-empty-state />
                        <h3 class="text-lg font-medium text-gray-900 dark:text-zinc-100">No recent requests</h3>
                        <p class="text-sm text-gray-500 dark:text-zinc-400 mt-1">You have not received any clearance requests recently.</p>
                        <button class=" cursor-pointer px-4 py-3 bg-[#7F22FE]  text-white rounded-lg hover:bg-purple-700 transition-colors mt-4" >
                            Refresh
                        </button>
                    </div>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{--@dd($units_metrics)--}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    window.addEventListener('updateChart', (event) => {
        const {
            approved,
            pending,
            rejected
        } = event.detail;
        updateChart(approved, pending, rejected);
    })

    let pendingRequests = @json($pending_requests);
    let statusChart;

    let unitCounts = {};

    // pendingRequests.forEach(item => {
    //     unitCounts[item.unit_name] = item.count;
    // });



    createChart(pendingRequests);

    function createChart($data)
    {
        statusChart = new Chart(document.getElementById('status-chart'), {
            type: "doughnut",
            data: {
                labels:   $data.map(item => item.unit_name),
                datasets: [{
                    data:  $data.map(item => item.count),
                    backgroundColor:[
                        '#8B5CF6', // purple
                        '#3B82F6', // blue
                        '#10B981', // green
                        '#F59E0B', // amber
                        '#EF4444', // red
                        '#EC4899'  // pink
                    ],
                    // hoverBackgroundColor: ['#039855', '#EEA23E', '#F59E0B','#8B5CF6','#3B82F6','#10B981'],
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
            statusChart.destroy();
        }
        createChart($approved, $pending, $rejected);

    }
</script>



