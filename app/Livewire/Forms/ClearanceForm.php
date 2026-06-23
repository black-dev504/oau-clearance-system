<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

class ClearanceForm extends Form
{
    public $means_of_identification;
    public $clearance_receipt;
    public $library_card;
    public $library_receipt;
    public $library_reg_number;

    public ?string $name = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $matric_no = null;
    public ?int $department_id = null;
    public ?string $faculty = null;
    public ?string $graduation_year = null;
    public ?string $address = null;
    public ?string $course = null;
    public ?string $hall = null;
    public ?string $block = null;
    public ?string $bed_space = null;
    public ?int $room_number = null;

    public bool $library_registration_status = false;

    public ?int $user_id = null;
    public ?int $selectedClearanceRequestId = null;

    public function validationAttributes()
    {
        return [
            'form.means_of_identification' => 'Means of Identification',
            'form.clearance_receipt' => 'DSA Payment Receipt',
            'form.name' => 'Name',
            'form.email' => 'Email',
            'form.phone' => 'Phone',
            'form.matric_no' => 'Matric Number',
            'form.department_id' => 'Department',
            'form.faculty' => 'Faculty',
            'form.graduation_year' => 'Graduation Year',
            'form.address' => 'Address',
            'form.course' => 'Course',
            'form.hall' => 'Hall',
            'form.block' => 'Block',
            'form.bed_space' => 'Bed Space',
            'form.room_number' => 'Room Number',
            'form.library_registration_status' => 'Library Registration Status',
            'form.library_card' => 'Library Card',
            'form.library_receipt' => 'Library Receipt',
            'form.library_reg_number' => ' Registration Number',

        ];
    }


    public function getRulesForForm($form): array
    {
        return match ($form) {
            'personalInfo' => [
                'form.means_of_identification' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'form.clearance_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'form.name' => 'required|string|max:255',
                'form.matric_no' => [
                    'required',
                    'string',
                    'max:12',
                    Rule::unique('clearance_requests', 'matric_no')
                        ->ignore($this->selectedClearanceRequestId),
                ],
                'form.department_id' => 'required|integer|exists:departments,id',
                'form.faculty' => 'nullable|string|exists:faculties,name|max:50',
                'form.graduation_year' => 'required|string|date_format:Y',
                'form.course' => 'required|string|max:50',

            ],

            'contact' => [
                'form.address' => 'required|string|max:255',
                'form.email' => 'required|email|max:255',
                'form.phone' => 'required|digits_between:10,15',
                'form.hall' => 'nullable|string|max:255',
                'form.block' => 'nullable|string|max:255',
                'form.bed_space' => 'nullable|string|max:255',
                'form.room_number' => 'nullable|digits_between:1,4',
            ],

            'library' => [
                'form.library_registration_status' => 'nullable|boolean',
                'form.library_receipt' => 'nullable|sometimes|required_without:form.library_card|image|mimes:jpeg,png,jpg|max:2048',
                'form.library_card' => 'nullable|sometimes|required_without:form.library_receipt|image|mimes:jpeg,png,jpg|max:2048',
                'form.library_reg_number' => 'nullable|required_without:form.library_receipt|string|max:15',
            ],
        };
    }


}
