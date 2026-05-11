<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Student extends Component
{

    public bool $registered;
    public string $rejection_reason = 'jj';


    public function openModal($modal): void
    {
        if ($modal === 'clearance-modal')
        {
            $this->dispatch('open-clearance-modal');
        }

        $this->dispatch('modal-show', name:$modal);
    }


    public function getStats()
    {
        $clearances = user()?->clearances ?? collect();

        return [
            'clearanceUnits' => $clearances,
            'total' => $clearances->count(),
            'approved' => $clearances->where('status', ClearanceStatus::APPROVED)->count(),
        ];
    }

    public function mount()
    {
        $this->registered = user()?->clearanceRequests()->exists();

    }

    public function render()
    {
        $stats = $this->getStats();
        return view('livewire.app.student', [
            'stats' => $stats,
            'user' => user(),
            'activities' => user()?->activities->take(6),
            'clearance_request' => $this->registered? user()?->clearanceRequests[0]: null,
        ])->layout('layouts.student', ['user' => user()]);
    }
}
