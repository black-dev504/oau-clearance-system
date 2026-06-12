<?php

namespace App\Livewire;

use App\Models\ClearanceRequest;
use App\Services\DashboardService;
use Livewire\Component;

class AdminDashboard extends Component
{
        public $selectedRequest;
        public $activeModal;

    public function openModal($modal, $id = null)
    {
        $this->activeModal = $modal;
        $this->selectedRequest = ClearanceRequest::findorFail($id);
        $this->dispatch('modal-show', name: $modal);
    }
    public function render(DashboardService $service)
    {
        $data = $service->data(user());
        return view('livewire.app.admin.dashboard', $data);
    }
}
