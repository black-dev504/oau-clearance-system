<?php

namespace App\Livewire;

use App\Models\ClearanceRequest;
use App\Models\Department;
use http\Env\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClearanceModal extends Component
{
    use WithFileUploads;

    public bool $showModal = false;
    public string $currentForm = 'personalInfo';
    protected array $steps = ['personalInfo', 'contact', 'library', 'review'];

    public string $studentIdPreview = '';
    public string $receiptPreview = '';

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
        'room_number' => null,
        'library_registration_status' => false,
    ];



    public function updatedInfoStudentId()
    {
        $this->validateOnly('info.studentId',
        [
            'info.studentId' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]
        );

        if ($this->info['studentId'])
        {
            $this->studentIdPreview = $this->info['studentId']->temporaryUrl();
        }

    }

    public function updatedInfoReceipt()
    {
        $this->validateOnly('receipt', [
            'info.receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($this->info['receipt'])
        {
            $this->receiptPreview = $this->info['receipt']->temporaryUrl();

        }
    }


    public function next(): void
    {
        $index = array_search($this->currentForm, $this->steps);
        if ($index < count($this->steps) - 1) {

//            $this->validate(
//                $this->getRulesForForm($this->currentForm),
//            );

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

    protected function validationAttributes()
    {
        return [
            'info.studentId' => 'Means of Identification',
            'info.receipt' => 'DSA Payment Receipt',
            'info.name' => 'Name',
            'info.email' => 'Email',
            'info.phone' => 'Phone',
            'info.matric_no' => 'Matric Number',
            'info.department' => 'Department',
            'info.faculty' => 'Faculty',
            'info.graduation_year' => 'Graduation Year',
            'info.address' => 'Address',
            'info.course' => 'Course',
            'info.hall' => 'Hall',
            'info.block' => 'Block',
            'info.bed_space' => 'Bed Space',
            'info.room_number' => 'Room Number',
            'info.library_registration_status' => 'Library Registration Status',

        ];
    }


  public function getRulesForForm($form): array
  {
     return match ($form) {
         'personalInfo' => [
             'info.studentId' => 'required|image|mimes:jpeg,png,jpg|max:2048',
             'info.receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
             'info.name' => 'required|string|max:255',
             'info.matric_no' => 'required|string|unique:requests,matric_no|max:10',
             'info.department' => 'required|string|exists:departments,name|max:50',
             'info.faculty' => 'required|string|exists:faculties,name|max:50',
             'info.graduation_year' => 'required|string|date_format:Y',
             'info.course' => 'required|string|max:50',

         ],

         'contact' => [
             'info.address' => 'required|string|max:255',
             'info.email' => 'required|email|max:255',
             'info.phone' => 'required|digits_between:10,15',
             'info.hall' => 'nullable|string|max:255',
             'info.block' => 'nullable|string|max:255',
             'info.bed_space' => 'nullable|string|max:255',
             'info.room_number' => 'nullable|digits_between:1,4',
         ],

         'library' => [
             'info.library_registration_status' => 'nullable|boolean',
         ],
     };
  }

  public function submit()
  {
      $student_id = $this->info['studentId']->storeOnCloudinary('means_of_identification');
      $receipt = $this->info['receipt']->storeOnCloudinary('payment_receipts');

      $this->info['means_of_identification'] = $student_id['public_id'];
      $this->info['clearance_receipt'] = $receipt['public_id'];

      $clearance_request = ClearanceRequest::create($this->info);



  }
    public function render()
    {
        return view('livewire.clearance-modal', [
            'departments' => Department::all(),
        ]);
    }
}
