<flux:modal name="confirm-officer-submission">
    <div class=" flex flex-col items-center p-6 ">
        <x-icons.caution />
        <h2 class="text-lg font-semibold mb-4 dark:text-zinc-100">Proceed?</h2>
        <p class="mb-4 dark:text-zinc-400">Are you sure you want to Approve this request?</p>
        <div class="flex justify-end space-x-2">
            <button
                @click="$flux.modal('confirm-officer-submission').close()"
                type="button"
                class="px-13 py-3 bg-white dark:bg-zinc-800 dark:border-white/10 dark:text-zinc-400 border text-gray-700 rounded-full" data-tw-dismiss="modal">
                Cancel
            </button>
            <button
                @click="window.dispatchEvent(new CustomEvent('approve-request')); $flux.modal('confirm-officer-submission').close()"
                type="button"
                class="px-13 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-full">
                Confirm
            </button>
        </div>
    </div>
</flux:modal>


