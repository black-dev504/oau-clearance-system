<div class=" ">
    <div>
        <h3 class="text-2xl text-gray-900 mb-2">Contact & Hostel Information</h3>
        <p class="text-gray-600">Tell us how to reach you and your residence details</p>
    </div>

    <div class="bg-gray-50 rounded-xl p-6 space-y-6">
        <h4 class="text-lg font-medium text-gray-900 flex items-center gap-2">
            <span class="text-2xl">📞</span>
            Contact Details
        </h4>
        <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 border border-gray-200 shadow-sm dark:border-white/10 rounded-xl p-4 mt-4">
            <div class="col-span-2">
                <flux:input wire:model="info.address" label="Contact address*" placeholder="1st ave"  />
            </div>
            <flux:input wire:model="info.email" label="Email Address" placeholder="johndoe@gmail.com" type="email"  />
            <flux:input wire:model="info.phone" label="Phone Number" type="number" placeholder="234 0000 0000"  />
        </div>

    </div>

    <div class="bg-gray-50 rounded-xl p-6 space-y-6 mt-6 ">


        <h4 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <span class="text-2xl">🏠</span>
                Hostel Information
            </h4>        <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 border border-gray-200 shadow-sm dark:border-white/10 rounded-xl p-4 mt-2">

                <flux:input wire:model="info.hall" label="Hall of Residence*" placeholder="Awo Hall"  />
                <flux:input wire:model="info.block" label="Block*" placeholder="F" type="text"  />
                <flux:input wire:model="info.room_number" label="Room Number" type="number" placeholder="303"  />
                <flux:input wire:model="info.bed_space" label="Bedspace" placeholder="corner 2"  />

            </div>
    </div>
</div>
