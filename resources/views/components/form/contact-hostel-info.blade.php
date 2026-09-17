<div x-data="{'schoolHostel': false}">
    <div>
        <h3 class="text-lg sm:text-2xl dark:text-zinc-100 text-gray-900 mb-2">Contact & Hostel Information</h3>
        <p class="text-sm sm:text-base text-gray-600 dark:text-zinc-400">Tell us how to reach you and your residence details</p>
    </div>

    <div class="bg-gray-50 dark:bg-zinc-800 rounded-xl p-3 sm:p-6 space-y-4 sm:space-y-6 mt-4">
        <h4 class="text-base sm:text-lg font-medium text-gray-900 dark:text-zinc-100 flex items-center gap-2">
            <span class="text-xl sm:text-2xl">📞</span>
            Contact Details
        </h4>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 border border-gray-200 shadow-sm dark:border-white/10 rounded-xl p-3 sm:p-4">
            <div class="col-span-1 md:col-span-2">
                <flux:input wire:model="form.address" label="Contact address*" placeholder="1st ave" />
            </div>
            <flux:input wire:model="form.email" label="Email Address" placeholder="johndoe@gmail.com" type="email" />
            <flux:input wire:model="form.phone" label="Phone Number"  inputmode="numeric"
                        pattern="[0-9\s]*" type="tel" placeholder="234 0000 0000" />
        </div>

        <flux:switch @click="schoolHostel = !schoolHostel" label="Did you stay in any of the school hostels" align="left" />
    </div>

    <div x-show="schoolHostel">
        <div class="bg-gray-50 dark:bg-zinc-800 rounded-xl p-3 sm:p-6 space-y-4 sm:space-y-6 mt-4 sm:mt-6">
            <h4 class="text-base sm:text-lg font-medium dark:text-zinc-100 text-gray-900 flex items-center gap-2">
                <span class="text-xl sm:text-2xl">🏠</span>
                Hostel Information
            </h4>
            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 border border-gray-200 shadow-sm dark:border-white/10 rounded-xl p-3 sm:p-4">
                <flux:select wire:model="form.hostel_id" label="Hall of Residence*">
                    <flux:select.option>Choose from the list...</flux:select.option>
                    @foreach($this->hostels as $hostel)
                        <flux:select.option value="{{$hostel->id}}">{{$hostel->name}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model="form.block" label="Block*" placeholder="F" type="text" />
                <flux:input wire:model="form.room_number" label="Room Number" type="number" placeholder="303" />
                <flux:input wire:model="form.bed_space" label="Bedspace" placeholder="corner 2" />
            </div>
        </div>
    </div>
</div>
