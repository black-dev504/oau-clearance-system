<?php

namespace App\Livewire;

use App\Models\ClearanceRequest;
use App\Models\User;
use Livewire\Component;

class OfficerManagement extends Component
{
    public function render()
    {
        return view('livewire.app.admin.officer-management', [
            'officers' => User::whereNotNull('unit_id' )->latest()->get()
        ]);
    }
}
