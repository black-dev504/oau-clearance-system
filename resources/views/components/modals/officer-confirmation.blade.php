<flux:modal.trigger name="approval-confirmation">
    <button
        class="px-6 py-3 bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg">
        Approve Application
    </button>
</flux:modal.trigger>


<flux:modal name="approval-confirmation">
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
                wire:click="approveRequest"
{{--                @click="window.dispatchEvent(new CustomEvent('approve-request')); $flux.modal('approval-confirmation').close()"--}}
                type="button"
                class="px-13 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-full">
                Confirm
            </button>
        </div>
    </div>
</flux:modal>


