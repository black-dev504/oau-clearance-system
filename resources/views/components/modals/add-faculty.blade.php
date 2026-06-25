

<flux:modal.trigger name="add-faculty">
    <button  class="px-3 py-2 bg-gradient-to-r from-violet-600 to-purple-700 text-white rounded-xl whitespace-nowrap">+ Add Faculty</button>
</flux:modal.trigger>


<flux:modal name="add-faculty" x-on:close="" wire:key="add-faculty" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">

    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-violet-600 to-purple-700">
        <div class="flex gap-3 items-center" >

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white">Add Faculty</h1>
                <p class="text-[14px] text-white/70">Create a new academic faculty</p>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 gap-4 flex w-full">
        <div class="w-full flex flex-col gap-4">
            <flux:input  wire:model="name" label="Faculty Name *" placeholder="e.g Faculty of Engineering" />
            <div class="flex gap-4 items-center">
                <flux:input  wire:model="code" label="Code *" placeholder="e.g FOE" />
                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach(config('faculties.palette') as $color)
                        <button
                            type="button"
                            wire:click="$set('accent', '{{ $color }}')"
                            class="w-8 h-8 rounded-full border-2 transition-all"
                            style="background-color: {{ $color }}; border-width: 4px ; border-color: {{ $this->accent === $color ? 'black' : 'transparent' }};"
                        ></button>
                    @endforeach
                        @error('accent')
                        <span class="text-red-500 text-sm mt-1 font-medium">
                                {{ $message }}
                            </span>
                        @enderror
                </div>

            </div>

            <flux:input  wire:model="dean" label="Dean *" placeholder="e.g. Prof. John Doe" />



        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 border-t border-gray-200 p-6">
        <button type="button"
                class="px-13 py-2 bg-white border border-gray-200 text-gray-700 rounded-[10px]" data-tw-dismiss="modal">
            Cancel
        </button>

        @if(!$this->editing)
            <flux:button variant="primary" color="violet"  wire:click="addFaculty"  class="px-13 py-3 !bg-gradient-to-r from-violet-600 to-purple-700 text-white  rounded-[10px]">
                Save
            </flux:button>
        @else
            <flux:button variant="primary" color="violet"  wire:click="editFaculty"  class="px-13 py-3 !bg-gradient-to-r from-violet-600 to-purple-700 text-white  rounded-[10px]">
                Update
            </flux:button>
        @endif

    </div>
</flux:modal>
