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

    public string $meansOfIdentificationPreview = '';
    public string $clearanceReceiptPreview = '';

    public array $completedSteps = [
        'personalInfo' => true,
        'contact' => false,
        'library' => false,
        'review' => false,
    ];

    public array $info = [
        'means_of_identification' => '',
        'clearance_receipt' => '',
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


    public function updated($name, $value)
    {
        if ($name === 'info.means_of_identification') {

            $this->validateOnly('info.means_of_identification',
                [
                    'info.means_of_identification' => 'required|image|mimes:jpeg,png,jpg|max:2048',

                ]
            );

            if ($value)
            {
                $this->meansOfIdentificationPreview = $value->temporaryUrl();
            }
        }

        if ($name === 'info.clearance_receipt')
        {
            $this->validateOnly('clearance_receipt', [
                'info.clearance_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($value)
            {
                $this->clearanceReceiptPreview = $value->temporaryUrl();

            }
        }
    }


    public function next(): void
    {

        $index = array_search($this->currentForm, $this->steps);
        if ($index < count($this->steps) - 1) {

            $this->validate(
                $this->getRulesForForm($this->currentForm),
                [
                    'info.matric_no.unique' => 'Matric Number already applied',

                ]
            );

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
            'info.means_of_identification' => 'Means of Identification',
            'info.clearance_receipt' => 'DSA Payment Receipt',
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
             'info.means_of_identification' => 'required|image|mimes:jpeg,png,jpg|max:2048',
             'info.clearance_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
             'info.name' => 'required|string|max:255',
             'info.matric_no' => 'required|string|unique:clearance_requests,matric_no|max:12',
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
      try
      {
          $means_of_identification = $this->info['means_of_identification']->storeOnCloudinary('means_of_identification');
          $clearance_receipt = $this->info['clearance_receipt']->storeOnCloudinary('payment_receipts');

          $this->info['means_of_identification'] = $means_of_identification['public_id'];
          $this->info['clearance_receipt'] = $clearance_receipt['public_id'];

          ClearanceRequest::create($this->info);

          $this->dispatch('form-submitted');
          $this->dispatch('submission-complete');
          $this->dispatch('close-clearance-modal');

          $this->dispatch('show-toast', [
              'type' => 'success',
              'message' => 'Successfully Submitted Clearance Request'
          ]);

      } catch (\Throwable $e) {
          logger($e->getMessage());
          $this->dispatch('show-toast', [
              'type' => 'error',
              'message' => 'Upload failed: ' . $e->getMessage()
          ]);
          $this->dispatch('submission-complete');
      }
  }

    public function render()
    {
        return view('livewire.clearance-modal', [
            'departments' => Department::all(),
        ]);
    }
}
