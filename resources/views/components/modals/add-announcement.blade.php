@php
    $units = \App\Models\Unit::all();
@endphp

<flux:modal name="add-announcement" wire:key="add-announcement" class="min-w-2xl rounded-2xl !p-0" xmlns:flux="http://www.w3.org/1999/html">
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
                <flux:input label="Title *" placeholder="Announcement Title" />
                <flux:textarea label="Message *" placeholder="Enter your announcement message..." />

                <div class="grid grid-cols-2 gap-4">
                    <flux:select label="Unit" >
                        <flux:select.option >Select unit...</flux:select.option>
                        <flux:select.option >All</flux:select.option>
                        @foreach($units as $unit)
                            <flux:select.option value="{{$unit->id}}">{{$unit->name}}</flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:select label="Priority" >
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
            <button type="submit"
                    class="px-13 py-3 bg-primary text-white  rounded-[10px]">
                Send Announcement
            </button>
        </div>
    </div>
</flux:modal>
