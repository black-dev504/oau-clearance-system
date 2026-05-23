<?php

namespace App\Livewire;

use App\Services\DashboardService;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render(DashboardService $service)
    {
        $data = $service->data(user());
        return view('livewire.app.admin.dashboard', $data);
    }
}
