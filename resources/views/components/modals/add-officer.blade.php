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
        <div class="bg-white p-6 gap-4 flex w-full">
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

        <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
            <button type="button"
                    class="px-13 py-3 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
                Cancel
            </button>

            @if(!$this->editing)
                <flux:button variant="primary" color="violet"  wire:click="registerNewOfficer"  class="px-13 py-3 !bg-primary text-white  rounded-[10px]">
                    Save
                </flux:button>
            @else
                <flux:button variant="primary" color="violet"  wire:click="editOfficer"  class="px-13 py-3 !bg-primary text-white  rounded-[10px]">
                    Update
                </flux:button>
            @endif

        </div>
</flux:modal>
