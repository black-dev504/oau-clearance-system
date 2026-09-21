<div class="space-y-6">
    <div class="flex justify-between items-center py-8">
        <div class="flex flex-col">
            <h1 class="text-2xl sm:text-4xl dark:text-zinc-100">Activity Log</h1>
            <p class="dark:text-zinc-400">System-wide audit trail — logins, admin actions, and clearance changes</p>
        </div>
    </div>

    {{-- Filters --}}
    <div class="flex flex-wrap items-end gap-3 p-4 border rounded-[10px] dark:border-white/10 border-[#E0DCD4]">
        <flux:select wire:model.live="actionFilter" label="Category" class="w-48">
            <flux:select.option value="">All categories</flux:select.option>
            @foreach($actionGroups as $prefix => $label)
                <flux:select.option value="{{ $prefix }}">{{ $label }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:select wire:model.live="causerFilter" label="User" class="w-48">
            <flux:select.option value="">All users</flux:select.option>
            @foreach($admins as $admin)
                <flux:select.option value="{{ $admin->id }}">{{ $admin->name }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:input type="date" wire:model.live="from" label="From" />
        <flux:input type="date" wire:model.live="to" label="To" />
        <flux:input wire:model.live.debounce.400ms="search" label="Search" placeholder="Search description..." class="w-56" />

        <flux:button variant="ghost" wire:click="resetFilters">Clear filters</flux:button>
    </div>

    {{-- Log table --}}
    <div class="border rounded-[10px] overflow-hidden dark:border-white/10 border-[#E0DCD4] shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gradient-to-r from-primary to-violet-700 text-left">
            <tr>
                <th class="px-4 py-3.5 font-medium text-white/90">Time</th>
                <th class="px-4 py-3.5 font-medium text-white/90">User</th>
                <th class="px-4 py-3.5 font-medium text-white/90">Action</th>
                <th class="px-4 py-3.5 font-medium text-white/90">Description</th>
                <th class="px-4 py-3.5 font-medium text-white/90">IP Address</th>
            </tr>
            </thead>
            <tbody class="divide-y dark:divide-white/10 bg-white dark:bg-transparent">
            @forelse($logs as $log)
                <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                    <td class="px-4 py-3 whitespace-nowrap text-gray-500 dark:text-zinc-400">
                        {{ $log->created_at->format('M j, Y g:i A') }}
                    </td>
                    <td class="px-4 py-3 font-medium dark:text-zinc-100">
                        {{ $log->causer?->name ?? 'System' }}
                    </td>
                    <td class="px-4 py-3">
                        <flux:badge size="sm" class="!bg-primary/10 !text-primary dark:!bg-primary/20">
                            {{ $log->action }}
                        </flux:badge>
                    </td>
                    <td class="px-4 py-3 dark:text-zinc-300">{{ $log->description }}</td>
                    <td class="px-4 py-3 text-gray-400 font-mono text-xs">{{ $log->ip_address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-10 text-center text-gray-400">
                        No activity matches these filters.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $logs->links() }}</div>
</div>
