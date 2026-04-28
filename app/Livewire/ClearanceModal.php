<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClearanceModal extends Component
{
    use WithFileUploads;

    public bool $showModal = false;
    public string $currentForm = 'personalInfo';
    protected array $steps = ['personalInfo', 'contact', 'library', 'review'];

    public string $studentIdPreview='';
    public string $receiptPreview;

    public array $completedSteps = [
        'personalInfo' => true,
        'contact' => false,
        'library' => false,
        'review' => false,
    ];

    public array $info = [
        'studentId' => '',
        'receipt' => '',
        'name' =>'',
        'email' => '',
        'phone' => '',
        'matric_no' => '',
        'department' =>'',
        'faculty' =>'',
        'graduation_year' =>'',
        'address' =>'',
        'course' =>'',
        'hall' =>'',
        'block' =>'',
        'bed_space' =>'',
        'room_number' =>'',
        'library_registration_status' => 0,
    ];



    public function updatedInfoStudentId()
    {
        if ($this->info['student_id'])
        {
            $this->studentIdPreview = $this->info['student_id']->temporaryUrl();
        }

        logger($this->studentIdPreview);
    }

    public function next(): void
    {
        $index = array_search($this->currentForm, $this->steps);
        if ($index < count($this->steps) - 1) {
            $this->currentForm = $this->steps[$index + 1];
            $this->completedSteps[$this->steps[$index + 1 ]]= true;

        }
        $this->dispatch('form-changed', form: $this->currentForm);
    }

    public function prev(): void
    {
        $index = array_search($this->currentForm, $this->steps);
        if ($index > 0) {
            $this->currentForm = $this->steps[$index - 1];
            $this->completedSteps[$this->steps[$index ]]= false;

        }

        $this->dispatch('form-changed', form: $this->currentForm);

    }

    public function render()
    {
        return view('livewire.clearance-modal', [
            'departments' => Department::all(),
        ]);
    }
}
