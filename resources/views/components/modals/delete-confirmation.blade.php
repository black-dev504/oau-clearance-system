@props([
    'id' => null,
    'fn' => '',
])

<flux:modal.trigger name="delete-{{ $id }}">
    <x-icons.delete />
</flux:modal.trigger>

<flux:modal name="delete-{{ $id }}">
    <div class="flex flex-col items-center p-6">
        <x-icons.caution />
        <h2 class="text-lg font-semibold mb-4 dark:text-zinc-100">Proceed?</h2>

        <div class="flex flex-col items-center mb-4">
            <p class="dark:text-zinc-400">Are you sure you want to delete?</p>
            <p class="text-sm text-red-300 italic text-center">Note: This action is irreversible</p>
        </div>

        <div class="flex justify-end space-x-2">
            <button
                @click="$flux.modal('delete-{{ $id }}').close()"
                type="button"
                class="px-13 py-3 bg-white dark:bg-zinc-800 dark:border-white/10 dark:text-zinc-400 border text-gray-700 rounded-full">
                Cancel
            </button>
            <button
                wire:click="{{ $fn }}({{ $id }})"
                type="button"
                class="px-13 py-3 bg-red-500 text-white rounded-full">
                Delete
            </button>
        </div>
    </div>
</flux:modal>
