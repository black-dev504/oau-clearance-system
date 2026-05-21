<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Student extends Component
{
    protected $listeners = ['dataUpdated' => '$refresh'];


    public array $data = [];

    public string $rejection_reason = '';
    public string $rejectedClearance = '';


    public function openModal($modal): void
    {

        if ($modal === 'clearance-modal') {
            $this->dispatch('open-clearance-modal');
        }

        $this->dispatch('modal-show', name: $modal);
    }


    public function render(DashboardService $service)
    {
        $data = $service->studentDashboard(auth()->user());

        return view('livewire.app.student.index', $data)
            ->layout('layouts.student', [
                'user' => auth()->user()
            ]);
    }

}
