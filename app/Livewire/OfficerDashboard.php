<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Http\Requests\DashboardRequest;
use App\Models\ClearanceRequest;
use App\Services\ClearanceService;
use App\Services\DashboardService;
use http\Env\Request;
use Illuminate\Support\Arr;
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

    public function closeModal(string|array $modals)
    {
        foreach (Arr::wrap($modals) as $modal) {
            $this->js("\$flux.modal('{$modal}').close()");
        }
        $this->reset(['activeModal', 'selectedRequest']);
    }

    public function approveRequest(ClearanceService $clearanceService, DashboardService $dashboardService)
    {
        $clearanceService->approveClearance($this->selectedRequest, user());

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Request approved successfully!'
        ]);

        $this->refreshDashboard($dashboardService);

        $this->closeModal(['approval-confirmation', 'view-request']);
    }


    public function rejectRequest(ClearanceService $clearanceService, DashboardService $dashboardService, $remark)
    {
        $clearanceService->rejectClearance($this->selectedRequest, auth()->user(), $remark);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Request rejected successfully!'
        ]);

        $this->refreshDashboard($dashboardService);

        $this->closeModal(['rejection-confirmation', 'view-request']);
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
