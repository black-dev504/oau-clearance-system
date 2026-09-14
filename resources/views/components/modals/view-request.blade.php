    @php
        use App\Enums\ClearanceStatus;
        $clearance = $this->selectedRequest?->clearanceForUnit(user()->unit_id);
    @endphp

    <flux:modal name="view-request" x-on:close="" class="w-full sm:max-w-2xl md:min-w-3xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">

        {{-- Header --}}
        <div class="w-full rounded-t-2xl p-4 sm:p-6 flex bg-gradient-to-r from-[#2D2855] to-secondary">
            <div class="flex flex-col sm:flex-row gap-3 items-center text-center sm:text-left w-full">
                <div class="flex w-14 h-14 sm:w-20 sm:h-20 shrink-0 items-center justify-center rounded-full border-2 border-white/30 bg-white/20">
                    <h1 class="font-bold text-white text-sm sm:text-base">{{ get_initials($this->selectedRequest?->name) }}</h1>
                </div>

                <div class="flex flex-col items-center sm:items-start w-full">
                    <h1 class="font-semibold text-[16px] sm:text-[20px] text-white mb-1 flex flex-col sm:flex-row sm:items-center gap-1">
                        <span>{{ $this->selectedRequest?->name }}</span>
                        <x-status-badge :status="$clearance?->status->label()" :classes="$clearance?->status->classes()" />
                    </h1>
                    <p class="text-[12px] sm:text-[14px] text-white/70">
                        Submitted on
                        <span>{{ $this->selectedRequest?->created_at->format('F j, Y \a\t g:i A') }}</span>
                    </p>
                </div>
            </div>
        </div>

        {{-- Body --}}
        <div class="bg-white dark:bg-zinc-800 p-4 sm:p-6 gap-4 flex w-full max-h-[70vh] overflow-y-auto">
            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">

                <div class="flex flex-col gap-6">

                    <x-unit-details title="Academic Details">
                        <flux:input disabled :value="$this->selectedRequest?->matric_no" label="MATRIC NUMBER" />
                        <flux:input disabled :value="$this->selectedRequest?->course" label="COURSE OF STUDY" />
                        <flux:input disabled :value="$this->selectedRequest?->department->name" label="DEPARTMENT" />
                        <flux:input disabled :value="$this->selectedRequest?->department->faculty->name" label="FACULTY" />
                        <flux:input disabled :value="$this->selectedRequest?->graduation_year" label="YEAR OF GRADUATION" />
                    </x-unit-details>

                    @if(user()->hasRole('admin') || user()?->isUnitOfficer('library'))
                        <x-unit-details title="Library Details">
                            <flux:input disabled :value="$this->selectedRequest?->library_reg_number ? 'REGISTERED' : 'NOT REGISTERED'" label="REGISTRATION STATUS" />
                            <flux:input disabled :value="$this->selectedRequest?->library_reg_number" label="REGISTRATION NUMBER" />
                            <flux:input disabled label="DEPARTMENT" value="" />
                        </x-unit-details>
                    @endif

                    @if(user()->hasRole('admin') || user()?->isUnitOfficer('hostel'))
                        <x-unit-details title="Hostel Details">
                            <flux:input disabled :value="$this->selectedRequest?->hall ?? 'Nil'" label="HALL OF RESIDENCE" />
                            <flux:input disabled :value="$this->selectedRequest?->block ?? 'Nil'" label="BLOCK" />
                            <flux:input disabled :value="$this->selectedRequest?->room_number ?? 'Nil'" label="ROOM NUMBER" />
                            <flux:input disabled :value="$this->selectedRequest?->bed_space ?? 'Nil'" label="BED SPACE" />
                        </x-unit-details>
                    @endif

                </div>

                <div>
                    <div class="flex flex-col gap-4 w-full">
                        <div class="flex flex-col w-full gap-2">
                            <h1 class="font-semibold font-serif text-[18px] sm:text-[20px] dark:text-zinc-100">Uploaded Documents</h1>
                            <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <x-view-image label="means of identification"
                                          :path="$this->selectedRequest?->cloudinaryUrl('means_of_identification')" />

                            @if(user()?->isUnitOfficer('dsa') || user()?->hasRole('admin'))
                                <x-view-image label="DSA payment receipt"
                                              :path="$this->selectedRequest?->cloudinaryUrl('clearance_receipt')" />
                            @endif

                            @if(user()?->isUnitOfficer('library') || user()?->hasRole('admin'))
                                @if($this->selectedRequest?->library_card)
                                    <x-view-image
                                        label="Library Card"
                                        :path="$this->selectedRequest?->cloudinaryUrl('library_card')"
                                    />
                                @elseif($this->selectedRequest?->library_receipt)
                                    <x-view-image
                                        label="Library Registration Receipt"
                                        :path="$this->selectedRequest?->cloudinaryUrl('library_receipt')"
                                    />
                                @endif
                            @endif

                            @if(user()?->hasRole('admin'))
                                <x-unit-details title="Clearance Status per Unit">
                                    @foreach($this->selectedRequest?->clearances ?? [] as $clearance)
                                        <div class="flex items-center gap-2 justify-between flex-wrap">
                                            <span class="capitalize">{{ $clearance->unit?->name }}</span>
                                            <x-status-badge :status="$clearance->status->label()" :classes="$clearance->status->classes()" />
                                        </div>
                                    @endforeach
                                </x-unit-details>
                            @endif
                        </div>

                        @if($clearance?->status === ClearanceStatus::REAPPLY)
                            <div class="flex flex-col gap-4 w-full">
                                <div class="flex flex-col w-full gap-2">
                                    <h1 class="font-semibold font-serif text-[18px] sm:text-[20px] dark:text-zinc-100">Reason for Rejection</h1>
                                    <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <flux:textarea disabled label="REASON FOR REJECTION">
                                        {{ $clearance->remark ?? 'No reason provided.' }}
                                    </flux:textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @if(user()->hasRole('officer'))
            <div class="border-t border-gray-200 dark:border-white/10 px-4 sm:px-8 py-4 sm:py-6 dark:bg-zinc-800 bg-gray-50 flex-shrink-0">
                <div class="flex flex-col-reverse sm:flex-row sm:flex-row-reverse gap-3 sm:gap-4">
                    <x-modals.officer-confirmation />
                    <x-modals.rejection-confirmation />
                </div>
            </div>
        @endif
    </flux:modal>
