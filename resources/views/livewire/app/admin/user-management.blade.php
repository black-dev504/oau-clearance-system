<div class="p-4 sm:p-6 space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">Manage Users</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Add, edit, or remove system users</p>
        </div>


    </div>



    {{-- Table --}}
    <x-unit-management-table>
        <x-slot:options>
            <div class="flex justify-between">

                <div class="flex flex-col">
                    <x-search wire:model.live.debounce.400ms="search"/>
                    <p class="text-[#6A7282] text-sm ml-1">{{ $users->total() }} results</p>
                </div>
                <div>
                    <flux:modal.trigger name="user-form-modal">
                        <button
                            type="button"
                            wire:click="openCreateModal"
                            class="cursor-pointer px-4 py-2.5 text-sm bg-linear-to-r from-[#4B3BE4] to-[#A70088] text-white rounded-lg hover:opacity-90 transition-opacity duration-200 shrink-0"
                        >
                            + Add User
                        </button>
                    </flux:modal.trigger>
                </div>
            </div>
        </x-slot:options>

        <x-slot:header>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Name</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Email</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Role</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider">Joined</th>
            <th class="text-left px-6 py-4 text-xs uppercase tracking-wider"></th>
        </x-slot:header>

        @foreach ($users as $user)

            <tr wire:key="user-{{ $user->id }}" class="hover:bg-gray-50 dark:hover:bg-zinc-700 group">
                <td class="px-6 py-4">
                    <div class="flex gap-4">

                        <x-icons.unit-icon color="#4B3BE4" :size="48">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3333 14V12.6667C13.3333 11.9594 13.0524 11.2811 12.5523 10.781C12.0522 10.281 11.3739 10 10.6667 10H5.33333C4.62609 10 3.94781 10.281 3.44772 10.781C2.94762 11.2811 2.66667 11.9594 2.66667 12.6667V14" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 7.33333C9.47276 7.33333 10.6667 6.13943 10.6667 4.66667C10.6667 3.19391 9.47276 2 8 2C6.52724 2 5.33333 3.19391 5.33333 4.66667C5.33333 6.13943 6.52724 7.33333 8 7.33333Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </x-icons.unit-icon>

                        <div class="flex justify-center items-center">
                        <span class="text-base text-gray-900 font-bold dark:text-zinc-100 whitespace-nowrap">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </span>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 text-gray-600 dark:text-zinc-300">
                    {{ $user->email }}
                </td>

                <td class="px-6 py-4">
                    <x-badge :value="Str::title($user->role)" :color="$roleColors[$user->role] ?? '#6A7282'" />
                </td>

                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400">
                    {{ $user->created_at->format('M d, Y') }}
                </td>

                <td class="flex px-6 py-4 group justify-end">
                    <div class="hidden group-hover:flex items-center gap-3 shrink-0">
                        <flux:modal.trigger name="user-form-modal">
                            <div wire:click="openEditMode({{ $user->id }})" class="cursor-pointer">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </flux:modal.trigger>

                        <flux:modal.trigger name="delete-user">
                            <button type="button" wire:click="$set('deleteId', {{ $user->id }})">
                                <x-icons.delete />
                            </button>
                        </flux:modal.trigger>
                    </div>
                </td>
            </tr>

        @endforeach

        <x-slot:pagination>
            @if ($users->hasPages())
                <div class="w-full px-4 py-4 dark:border-white/10">
                    <div class="w-full items-center">
                        <div>
                            {{ $users->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>
            @endif
        </x-slot:pagination>

        <x-modals.delete-confirmation name="user" fn="deleteUser"/>

        {{-- Add / Edit user modal --}}
        <flux:modal name="user-form-modal" wire:key="user-form-modal" class="w-full sm:max-w-lg rounded-2xl">
            <form wire:submit="save" class="space-y-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $editingUserId ? 'Edit User' : 'Add User' }}
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-zinc-400">
                        {{ $editingUserId ? 'Update this user\'s details below.' : 'Fill in the details to create a new user.' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <flux:input wire:model="first_name" label="First name" required autofocus />
                    <flux:input wire:model="last_name" label="Last name" required />
                </div>

                <flux:input wire:model="email" label="Email address" type="email" required />

                <flux:select wire:model="role" label="Role" required>
                    @foreach ($roles as $roleOption)
                        <flux:select.option value="{{ $roleOption }}">{{ ucfirst($roleOption) }}</flux:select.option>
                    @endforeach
                </flux:select>

                <flux:input
                    wire:model="password"
                    label="Password"
                    type="password"
                    :placeholder="$editingUserId ? 'Leave blank to keep current password' : ''"
                    :required="!$editingUserId"
                />

                <flux:input
                    wire:model="password_confirmation"
                    label="Confirm password"
                    type="password"
                    :required="!$editingUserId"
                />

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button
                        type="button"
                        x-on:click="$flux.modal('user-form-modal').close()"
                        class="cursor-pointer px-4 py-2 text-sm border border-gray-300 dark:border-white/10 text-gray-700 dark:text-zinc-100 rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="cursor-pointer px-4 py-2 text-sm bg-linear-to-r from-[#4B3BE4] to-[#A70088] text-white rounded-lg hover:opacity-90 transition-opacity"
                    >
                        {{ $editingUserId ? 'Save Changes' : 'Add User' }}
                    </button>
                </div>
            </form>
        </flux:modal>

    </x-unit-management-table>



    {{-- Delete confirmation modal --}}
{{--    <flux:modal name="delete-user-modal" wire:key="delete-user-modal" class="w-full sm:max-w-sm rounded-2xl">--}}
{{--        <div class="space-y-4">--}}
{{--            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Delete User</h2>--}}
{{--            <p class="text-sm text-gray-500 dark:text-zinc-400">--}}
{{--                Are you sure you want to delete this user? This action cannot be undone.--}}
{{--            </p>--}}
{{--            <div class="flex items-center justify-end gap-3">--}}
{{--                <button--}}
{{--                    x-on:click="$flux.modal('delete-user-modal').close()"--}}
{{--                    class="cursor-pointer px-4 py-2 text-sm border border-gray-300 dark:border-white/10 text-gray-700 dark:text-zinc-100 rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors"--}}
{{--                >--}}
{{--                    Cancel--}}
{{--                </button>--}}
{{--                <button--}}
{{--                    wire:click="deleteUser"--}}
{{--                    class="cursor-pointer px-4 py-2 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"--}}
{{--                >--}}
{{--                    Delete--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </flux:modal>--}}

</div>
