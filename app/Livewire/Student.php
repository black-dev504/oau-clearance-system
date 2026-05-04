<?php

namespace App\Livewire;

use App\Enums\ClearanceStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Student extends Component
{

    public $registered;


    public function openModal(): void
    {
        $this->dispatch('open-clearance-modal');
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
        ])->layout('layouts.student', ['user' => user()]);
    }
}
