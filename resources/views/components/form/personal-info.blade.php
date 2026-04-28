@props(
[
    'departments' => []
]
)


    <h4 class="font-medium text-xl">Personal Information</h4>
    <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 mt-4">
        <x-upload
            label="Means of Identification*"
            model="info.student_id"
            :preview="$this->studentIdPreview"
        />
        <x-upload label="DSA Payment Receipt" model="info.receipt"/>

        <flux:input wire:model="info.name" label="Student Name*" placeholder="Enter Full Name"  />
        <flux:input wire:model="info.graduation_year" label="Year of Graduation*" placeholder="eg.2023/24" type="text"  />
        <flux:input wire:model="info.matric_number" label="Matric Number" type="text" placeholder="CSC/2000/001"  />
        <flux:input wire:model="info.course" label="Course of Study" placeholder="Software Engineering"  />
        <flux:select  label="Department" wire:model="department" placeholder="Choose your department...">
            @foreach($departments as $department)
                <flux:select.option>{{$department->name}}</flux:select.option>

            @endforeach
        </flux:select>
        <flux:input wire:model="info.faculty" label="Faculty" placeholder="Technology" type="text" />

    </div>
