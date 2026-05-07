
<flux:modal name="rejection-confirmation" wire:key="rejection-modal" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
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
    <div class="bg-white p-6 gap-4 flex w-full">
        <div class="w-full flex flex-col gap-4">

            <p class="text-base text-[#2D2D2D]">You are about to reject this application. Please provide a reason for the rejection that will be communicated to the student.</p>

               <flux:textarea
                label="REASON FOR REJECTION *"
                placeholder="e.g., Missing required documents, Incomplete library clearance, Invalid payment receipt..."
                x-model="remarks"
               />

        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
        <button type="button"
                @click="$flux.modal('rejection-confirmation').close()"
                class="px-13 py-3 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
            Cancel
        </button>
        <button type="submit"
                @click="window.dispatchEvent(new CustomEvent('reject-request', { detail: { remarks: remarks } })); $flux.modal('rejection-confirmation').close() "
                class="px-13 py-3 bg-red-500 text-white  rounded-[10px]">
            Confirm Rejection
        </button>
    </div>
    </div>
</flux:modal>
