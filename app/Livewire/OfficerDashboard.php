<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Http\Requests\DashboardRequest;
use App\Models\Announcement;
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
    public $selectedAnnouncement;
    public $activeModal = null;

    public $remarks = '';


    public function openModal($modal, $requestId = null)
    {
        $this->activeModal = $modal;
        if ($requestId) {
            $this->selectedRequest = ClearanceRequest::with('clearances.unit')->find($requestId);
        }
        $this->dispatch('modal-show', name: $modal);
    }

    public function closeModal(string|array $modals)
    {
        foreach (Arr::wrap($modals) as $modal) {
            $this->js("\$flux.modal('{$modal}').close()");
        }
        $this->reset(['activeModal', 'selectedRequest']);
    }

    public function viewAnnouncement($id)
    {
        $this->selectedAnnouncement = Announcement::findOrFail($id);
        $this->dispatch('modal-show', name: 'view-announcement');
    }

    public function resetModal()
    {
        $this->selectedAnnouncement = null;
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


    public function rejectRequest(ClearanceService $clearanceService, DashboardService $dashboardService)
    {
        $this->validate(['remarks' => 'required|string|max:255'], ['remarks.required' => 'Remark is required']);

        $clearanceService->rejectClearance($this->selectedRequest, auth()->user(), $this->remarks);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Request rejected successfully!'
        ]);

        $this->refreshDashboard($dashboardService);

        $this->closeModal(['rejection-confirmation', 'view-request']);
        $this->remarks=null;
    }

    public function refreshDashboard(DashboardService $service)
    {
        $data = $service->officerDashboard($this->unit);

        $this->dispatch('updateChart',
            approved: $data['approved'],
            pending: $data['pending'],
            rejected: $data['rejected'],
            reapplied: $data['reapplied'],
            locked: $data['locked'],
        );

        return $data;
    }




    public function mount()
    {
        $this->unit = auth()->user()?->unit;
    }

    public function render(DashboardService $service)
    {
        $data = $this->refreshDashboard($service);
        return view('livewire.app.officer.dashboard', $data);
    }
}
