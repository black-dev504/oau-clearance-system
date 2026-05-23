@php
$units = \App\Models\Unit::all();
 @endphp
<flux:modal name="add-officer" wire:key="add-officer" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
    <div x-data="{ remarks: '' }">

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
                <flux:input label="First Name *" placeholder="Enter first name" />
                <flux:input label="Last Name *" placeholder="Enter Last name" />
                <flux:input label="Email address *" placeholder="Enter Officer Email Address" />

                    <flux:select label="Unit" >
                        <flux:select.option >Select unit...</flux:select.option>
                        @foreach($units as $unit)
                            <flux:select.option value="{{$unit->id}}">{{$unit->name}}</flux:select.option>
                        @endforeach
                    </flux:select>

            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
            <button type="button"
                    class="px-13 py-3 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
                Cancel
            </button>
            <button type="submit"
                    class="px-13 py-3 bg-primary text-white  rounded-[10px]">
                Add Officer
            </button>
        </div>
    </div>
</flux:modal>
