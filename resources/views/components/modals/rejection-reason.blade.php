
<flux:modal name="view-rejection-reason"  class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
    <div x-data="{ remarks: '' }">

        <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-[#E7000B] to-[#c10007]">
            <div class="flex gap-3 items-center" >
                <div class="flex w-12 h-12 items-center justify-center rounded-full border-2 border-white/30 bg-white/20">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 8.99999V11M12 15H12.01M5.072 19H18.928C20.468 19 21.43 17.333 20.66 16L13.732 3.99999C12.962 2.66699 11.038 2.66699 10.268 3.99999L3.34 16C2.57 17.333 3.532 19 5.072 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold text-[20px] text-white">Reason For Rejection </h1>
{{--                    <p class="text-[14px] text-white/70">{{$this->selectedRequest?->name}}</p>--}}
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-zinc-800 p-6 gap-4 flex w-full">
            <div class="w-full flex flex-col gap-4">

                <p class="text-base dark:text-zinc-400 text-[#2D2D2D]">Below is the reason for application rejection</p>

                <flux:input
                    disabled
                    label="REASON FOR REJECTION"
                    :value="$this->rejection_reason"
                />

            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
            <button type="button"
                    @click="$flux.modal('view-rejection-reason').close()"
                    class="px-13 py-3 bg-white dark:bg-zinc-800 dark:border-white/10 dark:text-zinc-400 border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
                Cancel
            </button>
            <button type="button"
                    @click="$flux.modal('view-rejection-reason').close()"
                    wire:click="openModal('clearance-modal')"
                    class="px-13 py-3 bg-gradient-to-r from-primary to-secondary text-white  rounded-[10px]">
                Reapply
            </button>
        </div>
    </div>
</flux:modal>
