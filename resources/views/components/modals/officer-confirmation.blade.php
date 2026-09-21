<flux:modal.trigger name="approval-confirmation">
    <button
        class="px-6 py-3 bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg">
        Approve Application
    </button>
</flux:modal.trigger>


<flux:modal name="approval-confirmation" class=" sm:max-w-2xl rounded-2xl !p-0">
    <div class=" flex flex-col items-center p-6 ">
        <x-icons.caution />
        <h2 class="text-lg font-semibold mb-4 dark:text-zinc-100">Proceed?</h2>
        <p class="mb-4 dark:text-zinc-400">Are you sure you want to Approve this request?</p>
        <div class="flex justify-end space-x-2">
            <button
                @click="$flux.modal('approval-confirmation').close()"
                type="button"
                class="px-13 py-3 bg-white dark:bg-zinc-800 dark:border-white/10 dark:text-zinc-400 border text-gray-700 rounded-full" data-tw-dismiss="modal">
                Cancel
            </button>
            <button
                wire:loading.attr="disabled"
                wire:target="approveRequest"
                wire:click="approveRequest"
{{--                @click="window.dispatchEvent(new CustomEvent('approve-request')); $flux.modal('approval-confirmation').close()"--}}
                type="button"
                class="px-13 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-full">

                <svg wire:loading wire:target="rejectRequest"
                     class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>

                <span wire:loading.remove wire:target="approveRequest">Confirm </span>
                <span wire:loading wire:target="approveRequest">Confirming...</span>



            </button>
        </div>
    </div>
</flux:modal>


