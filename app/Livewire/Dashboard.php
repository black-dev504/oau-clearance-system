<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Http\Requests\DashboardRequest;
use App\Models\ClearanceRequest;
use http\Env\Request;
use Livewire\Component;

class Dashboard extends Component
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
        $this->reset(['activeModal', 'selectedRequest']);
    }

   public function getUpdatedDataProperty(DashboardRequest $request)
   {
       $data = $request->data();
       $this->dispatch('updateChart',
           approved : $data['approved'] ?? 0,
           pending : $data['pending'] ?? 0,
           rejected : $data['rejected'] ?? 0,
       );
         return $data;
   }

   public function approveRequest()
   {
         $current_unit = $this->selectedRequest->clearanceForUnit(user()->unit_id);
         $current_unit->update(['status' => ClearanceStatus::APPROVED]);
         $this->dispatch('notification',  [
             'type' => 'success',
             'message'=>'Request approved successfully!'
         ]);
         $this->closeModal();
   }

   public function rejectRequest()
   {
       dd($this->remarks);
         $current_unit = $this->selectedRequest->clearanceForUnit(user()->unit_id);
         $current_unit->update(['status' => ClearanceStatus::REJECTED]);
         $this->dispatch('notification',  [
              'type' => 'success',
              'message'=>'Request rejected successfully!'
         ]);
         $this->closeModal();
   }

    public function mount()
    {
        $this->unit = request()->segment(1);
    }

    public function render()
    {
        $data = $this->updatedData;
        return view('livewire.app.dashboard', [
            'data' => $data,
            'chartData' => [
                'approved' => $data['approved'] ?? 0,
                'pending' => $data['pending'] ?? 0,
                'rejected' => $data['rejected'] ?? 0,
            ],
            'recentRequests' => user()->unit->clearanceRequests()->latest()->take(5)->get(),

        ])->layout('layouts.app');
    }
}
