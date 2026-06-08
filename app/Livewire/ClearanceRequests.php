<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Models\ClearanceRequest;
use App\Services\ClearanceService;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class ClearanceRequests extends Component
{
    use WithPagination;


    public $selectedRequest;
    public $search;
    public $activeModal;
    public $sortValue = 'Newest';
    public $currentStatus = null;


    public function openModal($modal, $id = null)
    {
        $this->activeModal = $modal;
        $this->selectedRequest = ClearanceRequest::findorFail($id);
        $this->dispatch('modal-show', name: $modal);
    }

    public function closeModal(string|array $modals)
    {
        foreach (Arr::wrap($modals) as $modal) {
            $this->js("\$flux.modal('{$modal}').close()");
        }
        $this->reset(['activeModal', 'selectedRequest']);
    }


    public function approveRequest(ClearanceService $service)
    {
        $service->approveClearance($this->selectedRequest, user());

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Request approved successfully!'
        ]);

        $this->closeModal(['approval-confirmation', 'view-request']);
    }


    public function rejectRequest(ClearanceService $service, $remark)
    {
        $service->rejectClearance($this->selectedRequest, auth()->user(), $remark);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Request rejected successfully!'
        ]);

        $this->closeModal(['rejection-confirmation', 'view-request']);
    }

    public function openReapplications()
    {
        $this->currentStatus = ClearanceStatus::REAPPLY;
    }

    #[On('change-sort-value')]
    public function sortChange($value)
    {
        $this->sortValue = $value;
    }

    public function setStatus($status)
    {
        $this->currentStatus = $status == ''
                               ? null
                               : ClearanceStatus::stringToEnum($status);
    }

    public function getRequestsProperty(ClearanceService $service)
    {
        return $service->requests(
            user(),
            $this->currentStatus,
            $this->search,
            $this->sortValue
        );
    }


    public function render()
    {

        return view('livewire.app.officer.clearance-requests', [
            'requests' => $this->requests

        ]);
    }
}
