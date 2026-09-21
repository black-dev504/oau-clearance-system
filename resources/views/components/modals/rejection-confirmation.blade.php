<flux:modal.trigger name="rejection-confirmation">

    <button
        class="px-6 py-3 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
        Reject Application
    </button>
</flux:modal.trigger>


<flux:modal name="rejection-confirmation"  wire:key="rejection-modal" class="w-full sm:max-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
    <div x-data="{ remarks: '' }">

    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-[#E7000B] to-[#c10007]">
        <div class="flex gap-3 items-center" >
            <div class="flex w-12 h-12 items-center justify-center rounded-full border-2 border-white/30 bg-white/20">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 8.99999V11M12 15H12.01M5.072 19H18.928C20.468 19 21.43 17.333 20.66 16L13.732 3.99999C12.962 2.66699 11.038 2.66699 10.268 3.99999L3.34 16C2.57 17.333 3.532 19 5.072 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white">Reject Application</h1>
                <p class="text-[14px] text-white/70">{{$this->selectedRequest?->name}}</p>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-zinc-800  p-6 gap-4 flex w-full">
        <div class="w-full flex flex-col gap-4">

            <p class="text-base text-[#2D2D2D] dark:text-zinc-400">You are about to reject this application. Please provide a reason for the rejection that will be communicated to the student.</p>

               <flux:textarea
                label="REASON FOR REJECTION *"
                placeholder="e.g., Missing required documents, Incomplete library clearance, Invalid payment receipt..."
{{--                x-model="remarks"--}}
                wire:model="remarks"
                required
               />

        </div>
    </div>

    <div class="grid grid-rows md:grid-cols-2 gap-4  border-t border-gray-200 dark:border-white/10 p-6">
        <button type="button"
                @click="$flux.modal('rejection-confirmation').close()"
                class="px-13 py-3 bg-white dark:border-white/10 dark:text-zinc-400 dark:bg-zinc-800 border border-gray-200 text-gray-700  rounded-[10px]" data-tw-dismiss="modal">
            Cancel
        </button>
        <button type="submit"
                wire:click="rejectRequest"
                wire:loading.attr="disabled"
                wire:target="rejectRequest"
                class="px-13 py-3 bg-red-500 text-white rounded-[10px] flex items-center justify-center gap-2
               disabled:opacity-70 disabled:cursor-not-allowed transition-opacity">
            <svg wire:loading wire:target="rejectRequest"
                 class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>

            <span wire:loading.remove wire:target="rejectRequest">Confirm Rejection</span>
            <span wire:loading wire:target="rejectRequest">Rejecting...</span>
        </button>

    </div>
    </div>
</flux:modal>
