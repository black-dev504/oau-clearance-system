<flux:modal name="confirm-submission">
    <div class=" flex flex-col items-center p-6 ">
        <x-icons.caution />
        <h2 class="text-lg font-semibold mb-4 dark:text-zinc-100">Proceed?</h2>
        <p class="mb-4 dark:text-zinc-400">Are you sure you want to submit this form?</p>
        <div class="flex justify-end space-x-2">
            <button
                @click="$flux.modal('confirm-submission').close()"
                type="button"
                class="px-13 py-3 bg-white dark:text-zinc-400 dark:border-white/10 dark:bg-zinc-800 border text-gray-700 rounded-full" data-tw-dismiss="modal">
                Cancel
            </button>
            <button
                @click="window.dispatchEvent(new CustomEvent('confirm-submit')); $flux.modal('confirm-submission').close()"
                type="button"
                class="px-13 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-full">
                Confirm
            </button>
        </div>
    </div>
</flux:modal>


