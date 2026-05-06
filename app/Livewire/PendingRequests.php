<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Models\ClearanceRequest;
use Livewire\Component;

class PendingRequests extends Component
{

    public $selectedRequest;
    public $search;
    public $activeModal;
    public $sortValue = 'Newest';
    public $currentTable = 'pending_requests';


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

    public function rejectRequest($remark)
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
        $this->closeModal();
    }

    #[On('change-sort-value')]
    public function sortChange($value)
    {
        $this->sortValue = $value;
    }

    public function render()
    {

        $query = ClearanceRequest::query()
                 ->whereHas('clearances', function ($query) {
                    $query->where('unit_id', user()->unit_id)
                    ->where('status', ClearanceStatus::PENDING)
                     ->when(! empty($this->search),
                         fn ($query) => $query->where('name', 'like', '%'.$this->search.'%')
                                                ->orWhere('matric_no', 'like', '%'.$this->search.'%')
                     );
            });

        $query = match ($this->sortValue) {
            'Newest' => $query->latest(),
            'Oldest' => $query->oldest(),
            'Name' => $query->orderBy('name'),
            default => $query->latest()
        };

        return view('livewire.app.pending-requests', [
            'pending_requests' => $query->paginate(10)



        ]);
    }
}
