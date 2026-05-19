@props(
[
    'departments' => []
]
)


    <h4 class="font-medium dark:text-zinc-100 text-xl">Personal Information</h4>
    <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 mt-4">
        <x-upload
            label="Means of Identification*"
            model="info.means_of_identification"
            :preview="$this->meansOfIdentificationPreview"
        />

        <x-upload
            label="DSA Payment Receipt"
            model="info.clearance_receipt"
            :preview="$this->clearanceReceiptPreview"
        />

        <flux:input wire:model="info.name"  label="Student Name*" placeholder="Enter Full Name"  />
        <flux:input wire:model="info.graduation_year" label="Year of Graduation*" placeholder="eg.2023/24" type="text"  />
        <flux:input wire:model="info.matric_no" label="Matric Number" type="text" placeholder="eg.CSC/2000/001"  />
        <flux:input wire:model="info.course" label="Course of Study" placeholder="eg.Software Engineering"  />
        <flux:select wire:model="info.department" label="Department"  >
            <flux:select.option >Choose your department....</flux:select.option>
            @foreach($departments as $department)
                <flux:select.option>{{$department->name}}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:input
            wire:model="info.faculty"
            label="Faculty"
            placeholder="e.g Technology"
            type="text"
            value
        />
    </div>
{{--value="{{\App\Models\Department::where('name', $this->info['department'])->get()->faculty}}"--}}
