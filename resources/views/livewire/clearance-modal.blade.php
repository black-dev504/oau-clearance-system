<div
    x-data="{ open: false, form: 'personalInfo', submitting: false }"
    x-show="open"
    @open-clearance-modal.window="open = true"
    @close-clearance-modal.window="open = false; submitting = false"
    @form-changed.window="form = $event.detail.form"
    @confirm-submit.window="submitting = true; $wire.submit()"
    @submission-complete.window="submitting = false"

    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4">

    <div class="bg-white dark:bg-zinc-800 rounded-2xl w-full max-w-5xl max-h-[95vh] flex flex-col shadow-2xl">

        <div
            x-show="submitting"
            x-cloak
            class="absolute inset-0 bg-white/80 dark:bg-zinc-600/5 backdrop-blur-sm rounded-2xl z-50 flex flex-col items-center justify-center gap-4">
            <svg class="animate-spin h-10 w-10 text-[#4b3be4]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            <p class="text-[#4b3be4] font-medium text-lg">Submitting your request...</p>
        </div>

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-[#4b3be4] to-[#a70088] px-8 py-6 rounded-t-2xl">
            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-4">
                                    <div class="relative w-14 h-14 p-1 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl flex items-center justify-center">
                                        <div class="relative w-full h-full rounded-xl">
                                            <img src="{{asset('assets/images/oauLogo.svg')}}" alt="Logo" class="absolute inset-0 w-full h-full object-cover rounded-xl" />
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl text-white">Clearance Request</h2>
                                        <p class="text-white/80 text-sm">Complete all steps to submit your request</p>

                                    </div>
                                </div>

                <button
                    @click="open = false"
                    class="text-white"
                >
                    ✕
                </button>

            </div>

            <div class="flex items-center justify-between mt-6">


                <x-progress-step label="Personal Information" step="personalInfo" icon="👤" first=true />
                <x-progress-step label="Contact & Hostel" step="contact" icon="🏠" />
                <x-progress-step label="Library" step="library" icon="📚" />
                <x-progress-step label="Review" step="review" icon="✔️" />

            </div>
        </div>


        <!-- CONTENT -->
        <div class="flex-1 overflow-y-auto p-6">
            <div class="flex-1 overflow-y-auto p-6">
                <div x-show="form === 'personalInfo'">
                    <x-form.personal-info :departments="$departments"/>
                </div>
                <div x-show="form === 'contact'">
                    <x-form.contact-hostel-info />
                </div>
                <div x-show="form === 'library'">
                    <x-form.library-info />
                </div>
                <div x-show="form === 'review'">
                    <x-form.review />
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 dark:border-white/10 dark:text-zinc-100 dark:bg-zinc-800 px-8 py-6 bg-gray-50 flex-shrink-0">
            <div class="flex items-center justify-between">
                <button
                    @click="$wire.prev()"
                    :disabled="$wire.currentForm === 'personalInfo'"
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                    Previous
                </button>

                <button
                    x-show="form !== 'review'"
                    @click="$wire.next()"
                    class="px-6 py-3 bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg">
                    Next
                </button>

                <flux:modal.trigger name="confirm-submission">
                <button
                    x-show="form === 'review'"
                    class="px-6 py-3 bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg">
                    Submit
                </button>
                </flux:modal.trigger>
            </div>
        </div>


    </div>
</div>
