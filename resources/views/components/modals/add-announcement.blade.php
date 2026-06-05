@php
    $units = \App\Models\Unit::all();
@endphp

<flux:modal name="add-announcement" x-on:close="$wire.resetModal()" wire:key="add-announcement" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
    <div x-data="{ remarks: '' }">

        <div class="w-full  rounded-t-2xl p-6 flex bg-primary">
            <div class="flex gap-3 items-center" >

                <div class="flex flex-col">
                    <h1 class="font-semibold text-[20px] text-white">Make New Announcement</h1>
                    <p class="text-[14px] text-white/70">Send announcement to officers and units</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 gap-4 flex w-full">
            <div class="w-full flex flex-col gap-4">
                <flux:input wire:model="title" label="Title *" placeholder="Announcement Title" />
                <flux:textarea wire:model="content" label="Message *" placeholder="Enter your announcement message..." />

                <div class="grid grid-cols-2 gap-4">
                    <div class=" w-full flex flex-col" x-data="{ units: @js($units) }">
                        <label class="text-[#666666] text-sm" for="units"  >Select target units. </label>
                        <div @class([
                                    'border rounded-md',
                                    'border-red-500' => $errors->has('recipients'),
                                    'border-gray-300' => !$errors->has('recipients'),
                                ])>
                        <div wire:ignore class="w-full flex flex-col space-y-2">
                            <select wire:model="recipients" name="units[]" class="tom-select w-full" data-placeholder="Select your units"
                                    multiple x-model="units">
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        </div>
                        @error('recipients')
                            <span class="text-red-500 text-sm mt-1 font-medium">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <flux:select wire:model="priority" label="Priority" >
                        <flux:select.option >Select priority...</flux:select.option>
                        <flux:select.option value="low">Low</flux:select.option>
                        <flux:select.option value="medium">Medium</flux:select.option>
                        <flux:select.option value="high">High</flux:select.option>
                    </flux:select>

                </div>

            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
            <button type="button"
                    class="px-13 py-3 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
                Cancel
            </button>

            @if(!$this->editing)
            <button wire:click="submit" type="submit"
                    class="px-13 py-3 bg-primary text-white  rounded-[10px]">
                Send Announcement
            </button>
            @else
                <button wire:click="editAnnouncement" type="submit"
                        class="px-13 py-3 bg-primary text-white  rounded-[10px]">
                    Update Announcement
                </button>
            @endif
        </div>
    </div>


</flux:modal>
