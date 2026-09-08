

<flux:modal.trigger name="add-unit">
    <button  class="px-3 py-2 bg-gradient-to-r from-violet-600 to-purple-700 text-white rounded-xl whitespace-nowrap">+ Add Unit</button>
</flux:modal.trigger>


<flux:modal name="add-unit" x-on:close="$wire.resetModal()" wire:key="add-unit" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">

    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-violet-600 to-purple-700">
        <div class="flex gap-3 items-center" >

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white">Add New Unit</h1>
                <p class="text-[14px] text-white/70">Create a new clearance processing unit</p>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 gap-4 flex w-full">
        <div class="w-full flex flex-col gap-4">
            <flux:input  wire:model="name" label="Unit Name *" placeholder="e.g Library" />
            <flux:input  wire:model="code" label="Unit Code *" placeholder="e.g LIB" />
            <flux:select  wire:model="type" label="Type" >
                <flux:select.option >Select type of unit...</flux:select.option>
                @foreach(array_filter(config('units.types'), fn($type) => !in_array($type['label'], ['Faculty', 'Department', 'Hostel'])) as $type)
                    <flux:select.option value="{{$type['label']}}">{{$type['label']}}</flux:select.option>
                @endforeach
            </flux:select>

        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
        <button type="button"
                class="px-13 py-2 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
            Cancel
        </button>

        @if(!$this->editing)
            <flux:button variant="primary" color="violet"  wire:click="addUnit"  class="px-13 py-3 !bg-gradient-to-r from-violet-600 to-purple-700 text-white  rounded-[10px]">
                Save
            </flux:button>
        @else
            <flux:button variant="primary" color="violet"  wire:click="updateUnit"  class="px-13 py-3 !bg-gradient-to-r from-violet-600 to-purple-700 text-white  rounded-[10px]">
                Update
            </flux:button>
        @endif

    </div>
</flux:modal>
