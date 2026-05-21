<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Http\Requests\DashboardRequest;
use App\Models\ClearanceRequest;
use App\Services\DashboardService;
use http\Env\Request;
use Livewire\Component;

class OfficerDashboard extends Component
{

    public $unit;
    public $selectedRequest;
    public $activeModal = null;

    public $remarks = '';


    public function openModal($modal, $id = null)
    {
        $this->activeModal = $modal;
        $this->selectedRequest = ClearanceRequest::findorFail($id);
        $this->dispatch('modal-show', name: $modal);
    }

    public function closeModal()
    {
//        $this->js('$flux.modal("'.$this->activeModal.'").close()');
//        $this->reset(['activeModal', 'selectedRequest']);
    }


   public function approveRequest(DashboardService $service)
   {
         $current_unit = $this->selectedRequest->clearanceForUnit(user()->unit_id);
         $current_unit->update(['status' => ClearanceStatus::APPROVED]);
         $this->dispatch('notification',  [
             'type' => 'success',
             'message'=>'Request approved successfully!'
         ]);
       $this->refreshDashboard($service);

         $this->closeModal();
   }

   public function rejectRequest(DashboardService $service,$remark)
   {
         $current_unit = $this->selectedRequest->clearanceForUnit(user()->unit_id);
         $current_unit->update([
             'status' => ClearanceStatus::REJECTED,
             'remark' => $remark
         ]);
         $this->dispatch('notification',  [
              'type' => 'success',
              'message'=>'Request rejected successfully!'
         ]);
       $this->refreshDashboard($service);

       $this->closeModal();
   }

    public function refreshDashboard(DashboardService $service)
    {
        $data = $service->officerDashboard($this->unit);

        $this->dispatch('updateChart',
            approved: $data['approved'],
            pending: $data['pending'],
            rejected: $data['rejected'],
        );
    }


    public function mount()
    {
        $this->unit = auth()->user()?->unit;
    }

    public function render(DashboardService $service)
    {
        $data = $service->officerDashboard($this->unit);
        return view('livewire.app.officer.dashboard', $data);
    }
}
