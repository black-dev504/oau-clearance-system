<div class="">
    <div
        x-init="
        Livewire.hook('request', ({ fail, succeed }) => {
            succeed(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
        });
    "
        wire:loading.flex
        wire:target="{{$this->reapplication ? 'update': 'submit'}}"
        x-cloak
        class="fixed inset-0 bg-white/80 dark:bg-zinc-600/5 backdrop-blur-sm z-[9999] flex flex-col items-center justify-center gap-4">
        <svg class="animate-spin h-10 w-10 text-[#4b3be4]" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
        </svg>
        <p class="text-[#4b3be4] font-medium text-lg">Submitting your request...</p>
    </div>

    <flux:modal name="clearance-modal" wire:key="clearance-modal"
                class="w-[calc(100%-2rem)] mx-auto sm:w-full sm:max-w-3xl md:max-w-5xl rounded-2xl !p-0"
                xmlns:flux="http://www.w3.org/1999/html">

        <div class="bg-white dark:bg-zinc-800 rounded-2xl w-full max-h-[90vh] sm:max-h-[95vh] flex flex-col overflow-hidden shadow-2xl">

            <!-- HEADER -->
            <div class="bg-gradient-to-r from-[#4b3be4] to-[#a70088] px-4 sm:px-8 py-4 sm:py-6 rounded-t-2xl">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <div class="relative w-10 h-10 sm:w-14 sm:h-14 p-1 shrink-0 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl flex items-center justify-center">
                            <div class="relative w-full h-full rounded-xl">
                                <img src="{{ asset('assets/images/oauLogo.svg') }}" alt="Logo"
                                     class="absolute inset-0 w-full h-full object-cover rounded-xl" />
                            </div>
                        </div>
                        <div>
                            <h2 class="text-base sm:text-2xl text-white">Clearance Request</h2>
                            <p class="text-white/80 text-[11px] sm:text-sm">Complete all steps to submit your request</p>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex  items-center justify-start sm:justify-between gap-4 sm:gap-0 mt-4 sm:mt-6 overflow-x-auto no-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0">
                    <x-progress-step label="Personal Information" step="personalInfo" icon="👤" first=true />
                    <x-progress-step label="Contact & Hostel" step="contact" icon="🏠" />
                    <x-progress-step label="Library" step="library" icon="📚" />
                    <x-progress-step label="Review" step="review" icon="✔️" />
                </div>
            </div>

            <!-- CONTENT -->
            <div class="flex-1 overflow-y-auto p-3 sm:p-6">
                <div x-show="$wire.currentForm === 'personalInfo'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0">
                    <x-form.personal-info :departments="$departments" />
                </div>
                <div x-show="$wire.currentForm === 'contact'" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0">
                    <x-form.contact-hostel-info />
                </div>
                <div x-show="$wire.currentForm === 'library'" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0">
                    <x-form.library-info />
                </div>
                <div x-show="$wire.currentForm === 'review'" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0">
                    <x-form.review />
                </div>
            </div>

            <!-- FOOTER -->
            <div class="border-t border-gray-200 dark:border-white/10 dark:text-zinc-100 dark:bg-zinc-800 px-3 sm:px-8 py-3 sm:py-6 bg-gray-50 flex-shrink-0">
                <div class="flex items-center justify-between gap-2 sm:gap-3">
                    <button
                        wire:click="prev"
                        :disabled="$wire.currentForm === 'personalInfo'"
                        class="px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-base border border-gray-300 text-gray-700 dark:border-white/10 dark:text-zinc-100 hover:dark:bg-zinc-600 rounded-lg hover:bg-gray-100 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2 shrink-0">
                        Previous
                    </button>

                    <button
                        x-show="$wire.currentForm !== 'review'"
                        wire:click="next"
                        class="px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-base bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg shrink-0">
                        Next
                    </button>

                    <flux:modal.trigger name="confirm-submission">
                        <button
                            x-show="$wire.currentForm === 'review'"
                            class="px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-base bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg shrink-0">
                            {{ $this->reapplication ? 'Update' : 'Submit' }}
                        </button>
                    </flux:modal.trigger>
                </div>
            </div>

        </div>

        <x-modals.student-confirmation />

    </flux:modal>

</div>
