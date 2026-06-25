

<flux:modal.trigger name="add-department">
    <button  class="px-3 py-2 bg-gradient-to-r from-violet-600 to-purple-700 text-white rounded-xl whitespace-nowrap">+ Add Department</button>
</flux:modal.trigger>


<flux:modal name="add-department" x-on:close="" wire:key="add-department" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">

    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-violet-600 to-purple-700">
        <div class="flex gap-3 items-center" >

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white">Add Department</h1>
                <p class="text-[14px] text-white/70">Create a department within a faculty</p>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 gap-4 flex w-full">
        <div class="w-full flex flex-col gap-4">
            <flux:input  wire:model="name" label="Department Name *" placeholder="e.g Computer Science" />
            <div class="grid grid-cols-2 gap-4 items-center w-full">
                <flux:input  wire:model="code" label="Code *" placeholder="e.g FOE" />
                <flux:select wire:model="faculty_id" label="Faculty"  >
                    <flux:select.option >Choose a Faculty....</flux:select.option>
                    @foreach($this->faculties as $faculty)
                        <flux:select.option value="{{$faculty->id}}">{{$faculty->name}}</flux:select.option>
                    @endforeach
                </flux:select>

            </div>

            <flux:input  wire:model="hod" label="Head of Department *" placeholder="e.g. Dr. John Doe" />



        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
        <button type="button"
                class="px-13 py-2 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
            Cancel
        </button>

        @if(!$this->editing)
            <flux:button variant="primary" color="violet"  wire:click="addDepartment"  class="px-13 py-3 !bg-gradient-to-r from-violet-600 to-purple-700 text-white  rounded-[10px]">
                Save
            </flux:button>
        @else
            <flux:button variant="primary" color="violet"  wire:click="editDepartment"  class="px-13 py-3 !bg-gradient-to-r from-violet-600 to-purple-700 text-white  rounded-[10px]">
                Update
            </flux:button>
        @endif

    </div>
</flux:modal>
