

<div
    x-data="{
        open: @entangle('showModal').live,
        form: @entangle('currentForm').live
    }"


    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4"
>
    <div x-text=""></div>

    <div class="bg-white rounded-2xl w-full max-w-5xl max-h-[95vh] flex flex-col shadow-2xl">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-[#4b3be4] to-[#a70088] px-8 py-6 rounded-t-2xl">
            <div class="flex justify-between items-center">

                <h2 class="text-white text-xl">Clearance Request</h2>

                <button
                    @click="open = false"
                    class="text-white"
                >
                    ✕
                </button>

            </div>
        </div>

        <!-- STEP DOTS -->
        <div class="flex gap-2 px-6 py-3">
            <template x-for="step in ['personalInfo','contact','library','review']">
                <div
                    class="w-2.5 h-2.5 rounded-full"
                    :class="form === step ? 'bg-primary scale-125' : 'bg-gray-300'"
                ></div>
            </template>
        </div>

        <!-- CONTENT -->
        <div class="flex-1 overflow-y-auto p-6">

            <div x-show="form === 'personalInfo'">
                <x-form.personal-info />
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
</div>
