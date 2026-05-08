<flux:modal name="view-request"  class="min-w-5xl rounded-2xl !p-0">
    @php
        $status = $this->selectedRequest?->clearanceForUnit(user()->unit_id)->status;
    @endphp
    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-[#2D2855] to-secondary">
        <div class="flex gap-3 items-center" >
            <div class="flex w-20 h-20 items-center justify-center rounded-full border-2 border-white/30 bg-white/20">
               <h1 class="font-bold text-white">{{get_initials($this->selectedRequest?->name)}}</h1>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white mb-1">{{$this->selectedRequest?->name}}<span class="ml-1">  <x-tag :status="$status?->label()" :classes="$status?->classes()" /></span></h1>
                <p class="text-[14px] text-white/70">Submitted on  <span>{{$this->selectedRequest?->created_at->format('F j, Y \a\t g:i A')}}</span></p>

            </div>
        </div>
    </div>


    <div class="bg-white dark:bg-zinc-800 p-6 gap-4 flex w-full">
        <div class="w-full grid lg:grid-cols-2 gap-8">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-4 w-full">
                    <div class="flex flex-col w-full gap-2">
                        <h1 class="font-semibold font-serif text-[20px] dark:text-zinc-100">Academic Details</h1>
                        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <flux:input disabled :value="$this->selectedRequest?->matric_no" label="MATRIC NUMBER"   />
                        <flux:input disabled :value="$this->selectedRequest?->course" label="COURSE OF STUDY"  />
                        <flux:input disabled :value="$this->selectedRequest?->department" label="DEPARTMENT" />
                        <flux:input disabled :value="$this->selectedRequest?->department" label="FACULTY"  />
                        <flux:input disabled :value="$this->selectedRequest?->graduation_year" label="YEAR OF GRADUATION" />
                    </div>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <div class="flex flex-col w-full gap-2">
                        <h1 class="font-semibold font-serif text-[20px] dark:text-zinc-100">Library Details</h1>
                        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <flux:input disabled :value="$this->selectedRequest?->matric_no" label="MATRIC NUMBER" value="CSC/20/100"  />
                        <flux:input disabled :value="$this->selectedRequest?->course" label="COURSE OF STUDY" value="Computer Science"  />
                        <flux:input disabled :value="$this->selectedRequest?->department" label="DEPARTMENT" value="Computer Science and Engineering"/>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col gap-4 w-full">
                    <div class="flex flex-col w-full gap-2">
                        <h1 class="font-semibold font-serif text-[20px] dark:text-zinc-100">Uploaded Documents</h1>
                        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <x-view-image label="means of identification"  :path="$this->selectedRequest
                                                                        ? cloudinary()
                                                                            ->image($this->selectedRequest->means_of_identification)
                                                                             ->resize(\Cloudinary\Transformation\Resize::fill(300, 150))
                                                                            ->toUrl()
                                                                        : ''" />
                        <x-view-image label="DSA payment receipt" />

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-200 dark:border-white/10 px-8 py-6 dark:bg-zinc-800 bg-gray-50 flex-shrink-0">
        <div class="flex items-center flex-row-reverse gap-4">



{{--            TODO: RENDER BUTTONS BASED ON CURRENT STATUS--}}

            <flux:modal.trigger name="confirm-officer-submission">
                <button
                    class="px-6 py-3 bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg">
                    Approve Application
                </button>
            </flux:modal.trigger>

            <flux:modal.trigger name="rejection-confirmation">

                <button
                    class="px-6 py-3 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                    Reject Application
                </button>
            </flux:modal.trigger>



        </div>
    </div>
</flux:modal>
