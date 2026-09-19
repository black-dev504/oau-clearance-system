<flux:modal name="locked-progress" class="md:w-[420px]">
    <div class="space-y-5">
        <div>
            <flux:heading size="lg">Clearance Progress</flux:heading>
            <flux:text class="mt-1 text-gray-500 dark:text-zinc-400">
                This request unlocks for your unit once every unit before yours in the sequence approves the student.
            </flux:text>
        </div>

        <flux:separator />

        <div class="space-y-3">
            @foreach(collect($this->selectedRequest?->clearances ?? [])->sortBy(fn($clearance) => $clearance->unit?->order) as $clearance)
                <div class="flex items-center gap-2 justify-between flex-wrap">
                    <span class="capitalize">{{ $clearance->unit?->name }}</span>
                    <x-status-badge :status="$clearance->status->label()" :classes="$clearance->status->classes()" />
                </div>
            @endforeach
        </div>

        <flux:separator />

        <div class="flex justify-end">
            <flux:button variant="ghost" x-on:click="$flux.modal('locked-progress').close()">
                Close
            </flux:button>
        </div>
    </div>
</flux:modal>
