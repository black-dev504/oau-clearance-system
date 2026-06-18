<?php

namespace App\Livewire;

use App\Livewire\Forms\ClearanceForm;
use App\Models\Clearance;
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
    public ClearanceForm $form;
    public string $currentForm = 'personalInfo';
    protected array $steps = ['personalInfo', 'contact', 'library', 'review'];

    public string $meansOfIdentificationPreview = '';
    public string $clearanceReceiptPreview = '';
    public string $libraryCardPreview = '';
    public string $libraryReceiptPreview = '';
    public bool $reapplication = false;

    public array $completedSteps = [
        'personalInfo' => true,
        'contact' => false,
        'library' => false,
        'review' => false,
    ];


    public function updated($name, $value)
    {
        if ($name === 'form.means_of_identification')
        {

//          $this->validateOnly('form.means_of_identification',
//                [
//                    'form.means_of_identification' => 'required|image|mimes:jpeg,png,jpg|max:2048',
//
//                ]
//            );

            if ($value)
            {
                $this->meansOfIdentificationPreview = $value->temporaryUrl();
            }
        }

        if ($name === 'form.clearance_receipt')
        {
//            $this->validateOnly('form.clearance_receipt', [
//                'form.clearance_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
//            ]);

            if ($value)
            {
                $this->clearanceReceiptPreview = $value->temporaryUrl();

            }
        }


        if ($name === 'form.library_card')
        {
//            $this->validateOnly('library_card', [
//                'form.library_card' =>'required|image|mimes:jpeg,png,jpg|max:2048',
//            ]);

            if ($value)
            {
                $this->libraryCardPreview = $value->temporaryUrl();
                $this->reset('form.library_receipt', 'libraryReceiptPreview');

            }
        }

        if ($name === 'form.library_receipt')
        {
//            $this->validateOnly('library_receipt', [
//                'form.library_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
//            ]);

            if ($value)
            {
                $this->libraryReceiptPreview = $value->temporaryUrl();
                $this->reset('form.library_card' , 'libraryCardPreview');

            }
        }
    }


    public function next(): void
    {

        $index = array_search($this->currentForm, $this->steps);
        if ($index < count($this->steps) - 1) {
                $this->validate(
                    $this->form->getRulesForForm($this->currentForm),
                    [
                        'form.matric_no.unique' => 'Matric Number already applied',
                        'form.library_receipt.required_without' => 'Library receipt is required if no library card is provided.',
                        'form.library_reg_number.required_without' => 'Registration number is required if you are registered.',

                    ]
                );


            $this->currentForm = $this->steps[$index + 1];
            $this->completedSteps[$this->steps[$index + 1 ]]= true;

        }
        $this->dispatch('form-changed', form: $this->currentForm);

    }

    protected function validationAttributes()
    {
        return $this->form->validationAttributes();
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


    #[On('open-reapply-modal')]
    public function loadForReapplication(int $id): void
    {
        $clearance = Clearance::findOrFail($id);
        $clearance_request = $clearance->clearanceRequests;
        $this->form->selectedClearanceRequestId = $clearance_request->id;

        $this->reapplication = true;
        $this->form->fill(
            $clearance_request->only([
                'name',
                'email',
                'phone',
                'matric_no',
                'department',
                'faculty',
                'graduation_year',
                'address',
                'course',
                'hall',
                'block',
                'bed_space',
                'room_number',
//              'library_registration_status',
                'library_reg_number',
            ])
        );

        $this->meansOfIdentificationPreview = $clearance_request->cloudinaryUrl('means_of_identification');
        $this->clearanceReceiptPreview = $clearance_request->cloudinaryUrl('clearance_receipt');
        $this->libraryCardPreview = $clearance_request->library_card && $clearance_request->cloudinaryUrl('library_card');
        $this->libraryReceiptPreview = $clearance_request->library_receipt && $clearance_request->cloudinaryUrl('library_receipt');
        $this->dispatch('modal-show', name: 'clearance-modal');
    }

  public function submit()
  {
      try
      {
          $means_of_identification = $this->form->means_of_identification->storeOnCloudinary('means_of_identification');
          $clearance_receipt = $this->form->clearance_receipt->storeOnCloudinary('payment_receipts');
          $library_receipt = $this->form->library_receipt?->storeOnCloudinary('library_receipts');
          $library_card = $this->form->library_card?->storeOnCloudinary('library_cards');

          $this->form->means_of_identification = $means_of_identification['public_id'];
          $this->form->clearance_receipt = $clearance_receipt['public_id'];
          $this->form->library_receipt= $library_receipt['public_id'] ?? null;
          $this->form->library_card = $library_card['public_id'] ?? null;

          $this->form->user_id = user()->id;

          $data = $this->form->all();
          ClearanceRequest::create($data);

          $this->dispatch('form-submitted');
          $this->dispatch('close-clearance-modal');
          $this->dispatch('notification', [
              'type' => 'success',
              'message' => 'Successfully Submitted Clearance Request'
          ]);
          $this->dispatch('dataUpdated');


//          $this->reset($this->info, $this->meansOfIdentificationPreview, $this->currentForm, $this->clearanceReceiptPreview);

      } catch (\Throwable $e) {
          logger($e->getMessage());
          $this->dispatch('notification', [
              'type' => 'error',
              'message' => 'Upload failed: ' . $e->getMessage()
          ]);
      }


  }

    public function render()
    {
        return view('livewire.clearance-modal', [
            'departments' => Department::all(),
        ]);
    }
}
