@php
$units = \App\Models\Unit::all();
 @endphp

<flux:modal.trigger name="add-officer"
>
    <button  class="px-3 py-2 bg-primary text-white rounded-xl whitespace-nowrap"> Add Officer</button>
</flux:modal.trigger>


<flux:modal name="add-officer" x-on:close="$wire.resetModal()" wire:key="add-officer" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">

        <div class="w-full  rounded-t-2xl p-6 flex bg-primary">
            <div class="flex gap-3 items-center" >

                <div class="flex flex-col">
                    <h1 class="font-semibold text-[20px] text-white">Add New Officer</h1>
                    <p class="text-[14px] text-white/70">Assign new officer to a unit</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-zinc-800 p-6 gap-4 flex w-full">
            <div class="w-full flex flex-col gap-4">
                <flux:input  wire:model="first_name" label="First Name *" placeholder="Enter first name" />
                <flux:input  wire:model="last_name" label="Last Name *" placeholder="Enter Last name" />
                <flux:input   wire:model="email" label="Email address *" placeholder="Enter Officer Email Address" />
                <flux:select  wire:model="unit_id" label="Unit" >
                    <flux:select.option >Select unit...</flux:select.option>
                    @foreach($units as $unit)
                        <flux:select.option value="{{$unit->id}}">{{$unit->name}}</flux:select.option>
                    @endforeach
                </flux:select>
                <div class="grid grid-cols-3 gap-3">
                    <div class="col-span-2">
                        <flux:input wire:model="password"  label="Password *"  placeholder="Enter password" type="password" viewable />
                    </div>
                    <flux:button variant="outline" color="gray" class="h-[40px] mt-6" wire:click="generateDefaultPassword">Generate</flux:button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 border-t dark:border-white/10 border-gray-200 p-6">
            <button type="button" wire:click="resetModal"
                    class="px-13 py-2 bg-white dark:text-zinc-400 border dark:bg-zinc-800 dark:border-white/10 border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
                Cancel
            </button>

            @if(!$this->editing)
                <flux:button variant="primary" color="violet"
                             wire:click="registerNewOfficer"
                             wire:loading.attr="disabled"
                             wire:target="registerNewOfficer"
                             class="px-13 py-3 !bg-primary text-white  rounded-[10px]">

                    <span wire:loading.remove wire:target="registerNewOfficer">Add Officer</span>
                    <span wire:loading wire:target="registerNewOfficer">Adding...</span>
                </flux:button>
            @else
                <flux:button variant="primary" color="violet"
                                 wire:click="editOfficer"
                                 wire:loading.attr="disabled"
                                 wire:target="editOfficer"
                             class="px-13 py-3 !bg-primary text-white  rounded-[10px]">

                    <span wire:loading.remove wire:target="editOfficer">Update Officer</span>
                    <span wire:loading wire:target="editOfficer">Updating...</span>
                </flux:button>
            @endif

        </div>
</flux:modal>
