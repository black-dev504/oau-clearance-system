@props([
    'name' => '',
    'fn' => '',
])



<flux:modal name="delete-{{$name}}">
    <div class="flex flex-col items-center p-6">
        <x-icons.caution />
        <h2 class="text-lg font-semibold mb-4 dark:text-zinc-100">Proceed?</h2>

        <div class="flex flex-col items-center mb-4">
            <p class="dark:text-zinc-400">Are you sure you want to delete?</p>
            <p class="text-sm text-red-300 italic text-center">Note: This action is irreversible</p>
        </div>

        <div class="flex justify-end space-x-2">
            <button
                @click="$flux.modal('delete-{{ $name }}').close()"
                type="button"
                class="px-13 py-3 bg-white dark:bg-zinc-800 dark:border-white/10 dark:text-zinc-400 border text-gray-700 rounded-full">
                Cancel
            </button>
            <button
                wire:click="{{ $fn }}()"
                wire:loading.attr="disabled"
                wire:target="{{ $fn }}"
                type="button"
                class="px-13 py-3 bg-red-500 text-white rounded-full flex items-center justify-center gap-2
           disabled:opacity-70 disabled:cursor-not-allowed transition-opacity">
                <svg wire:loading wire:target="{{ $fn }}"
                     class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>

                <span wire:loading.remove wire:target="{{ $fn }}">Delete</span>
                <span wire:loading wire:target="{{ $fn }}">Deleting...</span>
            </button>
        </div>
    </div>
</flux:modal>
