@php
    use App\Enums\ClearanceStatus
@endphp
<div class="dark:bg-zinc-800">
        <div class="flex flex-col py-8">
            <h1 class=" text-4xl dark:text-zinc-100"> Student Dashboard</h1>
            <p class="dark:text-zinc-400">Track your clearance progress and manage pending actions</p>
        </div>

        @if(!$registered)
            <div class=" flex flex-col gap-6 max-w-3xl mx-auto">

                <div class="  flex flex-col p-8 gap-6 bg-white dark:bg-zinc-600/20 dark:border-white/10 border border-primary-border rounded-[20px] text-center items-center">
                    <x-icons.envelope />

                    <div class="flex flex-col gap-2">
                        <h1 class="text-3xl dark:text-zinc-100">Welcome to the Clearance Portal</h1>
                        <p class="text-[18px] dark:text-zinc-400">You haven't submitted a clearance request yet. Start your clearance process to get approved by all university units.</p>
                    </div>

                        <button wire:click="openModal" type="button" class="inline-flex items-center cursor-pointer bg-linear-to-r text-center from-[#4B3BE4] to-[#A70088] text-white px-8 py-4.5 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M10 4V16M4 10H16" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                            </svg> Start Clearance Request
                        </button>

                </div>

                <div class="bg-white dark:border-white/10 dark:bg-zinc-600/20 border border-gray-200 rounded-xl  p-8">
                    <h3 class="text-2xl text-gray-900 dark:text-zinc-100 mb-6">What to Expect</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                    <path d="M14 2V8H20" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                    <path d="M16 13H8" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                    <path d="M16 17H8" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg text-gray-900 dark:text-zinc-100 mb-2">Fill Out Your Information</h4>
                                <p class="text-gray-600 dark:text-zinc-400">Complete your personal details and upload required documents like transcripts, ID cards, and forms.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.76489 14.1003 1.98232 16.07 2.86" stroke="#a70088" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                    <path d="M22 4L12 14.01L9 11.01" stroke="#a70088" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg text-gray-900 mb-2 dark:text-zinc-100">Submit to All Units</h4>
                                <p class="text-gray-600 dark:text-zinc-400">Your clearance will be sent to Library, DSA, Hostel, Senate, and other university units for review.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-green-100 dark:bg-zinc-600/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#027a48" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                    <path d="M12 6V12L16 14" stroke="#027a48" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg text-gray-900 mb-2 dark:text-zinc-100">Track Your Progress</h4>
                                <p class="text-gray-600 dark:text-zinc-400">Monitor approval status from each department, view feedback, and take action on any rejected applications.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6 bg-blue-50 dark:bg-zinc-600/20 dark:border-white/10 border border-blue-200 rounded-xl p-6">
                    <div class="flex gap-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="flex-shrink-0">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                            <path d="M12 16V12" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                            <path d="M12 8H12.01" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                        </svg>
                        <div>
                            <h4 class="text-lg text-gray-900 dark:text-zinc-100 mb-2">Documents You'll Need</h4>
                            <ul class="text-gray-700 dark:text-zinc-400 space-y-1">
                                <li>• Valid Student ID Card</li>
                                <li>• Any outstanding fee receipts (if applicable)</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        @else
                @php
                    $percentage = round(($stats['approved'] / max($stats['total'], 1)) * 100);
                @endphp
            <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-6 mb-8 text-white">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-2xl mb-1">Clearance Progress</h2>
                        <p class="text-white/80 "> {{$stats['approved']}} of {{$stats['total']}} units cleared</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl mb-1">{{$percentage}}%</div>
                        <p class="text-white/80">Complete</p>
                    </div>
                </div>

                <div class="w-full bg-white/20 rounded-full h-3">
                    <div class="bg-white rounded-full h-3 transition-all duration-500 "
                         style="width: {{ $percentage }}%;">
                    </div>
                </div>

            </div>

            <div class="mb-8">
                <h2 class="text-2xl text-gray-900  dark:text-zinc-100 mb-2">Clearance Status by Unit</h2>
                <p class="text-gray-600 mb-6 dark:text-zinc-400">Track your clearance progress across all departments</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                @foreach($stats['clearanceUnits'] as $clearance)
                    <x-student-card :title="$clearance?->unit?->name" :status="$clearance->status" :reapply="$clearance->status->label() === 'Rejected'" submission_date="{{ $clearance->created_at->diffForHumans() }}" />

                @endforeach
            </div>

            <div class="bg-white dark:bg-zinc-600/20 dark:border-white/10 border border-gray-200 rounded-xl p-6 my-8">
                <h3 class="text-xl text-gray-900 dark:text-zinc-100 mb-4">Recent Activity</h3>
                <div class="space-y-3">
                    @foreach($activities as $activity )
                        <div class="flex items-start gap-3 pb-3 border-b dark:border-white/10 border-gray-100">
                            <div class="w-2 h-2 rounded-full mt-2 flex-shrink-0
                                 @if($activity->type === ClearanceStatus::APPROVED ) bg-green-500
                                 @elseif($activity->type === ClearanceStatus::PENDING) bg-yellow-500
                                 @elseif($activity->type === ClearanceStatus::REJECTED) bg-red-500
                                 @elseif($activity->type === ClearanceStatus::SUBMITTED) bg-purple-400
                                 @endif
                           " ></div>
                            <div class="flex-1">
                                <p class="text-gray-900 dark:text-zinc-100">{{$activity->title}}</p>
                                <p class="text-sm text-gray-500  dark:text-zinc-400"> {{ $activity->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl text-gray-900 dark:text-zinc-100 mb-2">Submitted Details</h2>
                <p class="text-gray-600 dark:text-zinc-400 mb-6">Review your submitted clearance information</p>

                <div class="bg-white dark:bg-zinc-600/20 border dark:border-white/10 border-gray-200 rounded-xl overflow-hidden">
                    <div class="grid md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-200 dark:divide-white/10">
                        <div class="p-6">
                            <h3 class="text-lg text-gray-900 dark:text-zinc-100 mb-4 flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10 10C12.7614 10 15 7.76142 15 5C15 2.23858 12.7614 0 10 0C7.23858 0 5 2.23858 5 5C5 7.76142 7.23858 10 10 10Z" fill="#4b3be4"/>
                                    <path d="M10 12C4.477 12 0 14.015 0 16.5V20H20V16.5C20 14.015 15.523 12 10 12Z" fill="#4b3be4"/>
                                </svg>
                                Personal Information
                            </h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-zinc-400">Full Name</p>
                                    <p class="text-gray-900 dark:text-zinc-100">{{$user->fullName}}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-zinc-400 ">Student ID</p>
                                    <p class="text-gray-900 dark:text-zinc-100">{{$clearance_request->matric_no}}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-zinc-400">Email</p>
                                    <p class="text-gray-900 dark:text-zinc-100">{{$clearance_request->email}}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-zinc-400">Phone Number</p>
                                    <p class="text-gray-900 dark:text-zinc-100">{{$clearance_request->phone}}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-zinc-400">Program</p>
                                    <p class="text-gray-900 dark:text-zinc-100">Bsc.{{$clearance_request->course}}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-zinc-400">Graduation Year</p>
                                    <p class="text-gray-900 dark:text-zinc-100">{{$clearance_request->graduation_year}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg text-gray-900 dark:text-zinc-100 mb-4 flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M12 0H4C2.01 0 2 0.9 2 2L2 18C2 19.1 2.89 20 3.99 20H16C17.1 20 18 19.1 18 18V6L12 0ZM4 18V2H11V7H16V18H4Z" fill="#4b3be4"/>
                                </svg>
                                Uploaded Documents
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-zinc-700/40 rounded-lg">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded flex items-center justify-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M12 0H4C2.9 0 2 0.9 2 2V18C2 19.1 2.9 20 4 20H16C17.1 20 18 19.1 18 18V6L12 0Z" fill="#4b3be4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900 dark:text-zinc-100">Means of Identification</p>
{{--                                            TODO: IMAGE FORMAT AND PREVIEW--}}
                                            <p class="text-xs text-gray-500 dark:text-zinc-400">2.4 MB • PDF</p>
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700 text-sm">View</button>
                                </div>

                                <div class="flex items-center justify-between p-3  dark:bg-zinc-700/40 bg-gray-50 rounded-lg">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded flex items-center justify-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M12 0H4C2.9 0 2 0.9 2 2V18C2 19.1 2.9 20 4 20H16C17.1 20 18 19.1 18 18V6L12 0Z" fill="#4b3be4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900 dark:text-zinc-100">Payment Receipt</p>
{{--                                            TODO: IMAGE FORMAT AND PREVIEW--}}
                                            <p class="text-xs text-gray-500 dark:text-zinc-400">2.4 MB • PDF</p>
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700 text-sm">View</button>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 p-4 dark:bg-zinc-600/20 dark:border-white/10 bg-gray-50 flex items-center justify-between">
                        <p class="text-sm text-gray-500 dark:text-zinc-400">
                            Submitted on {{ $clearance_request->created_at->format('F j, Y \a\t g:i A') }}
                        </p>                        <button class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">

                        </button>
                    </div>
                </div>
                <div class="my-8 bg-white dark:bg-zinc-600/20">
                    <div class="flex items-center gap-2 mb-4">
                        <h2 class="text-2xl text-gray-900 dark:text-zinc-100">Actions Required</h2>
                        <span class="bg-red-100 text-red-700 px-2.5 py-0.5 rounded-full text-sm">
              2
              </span>
                    </div>
                </div>

            </div>
        @endif
    <div x-cloak>

    <livewire:clearance-modal />
    </div>
    <x-modals.student-confirmation />

</div>
