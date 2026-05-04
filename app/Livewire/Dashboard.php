<?php

namespace App\Livewire;

use App\Http\Requests\DashboardRequest;
use http\Env\Request;
use Livewire\Component;

class Dashboard extends Component
{

    public $unit;



   public function getUpdatedDataProperty(DashboardRequest $request)
   {
       $data = $request->data();
       $this->dispatch('updateChart',
           approved : $data['approved'] ?? 0,
           pending : $data['pending'] ?? 0,
           rejected : $data['rejected'] ?? 0,
       );
         return $data;
   }

    public function mount()
    {
        $this->unit = request()->segment(1);
    }

    public function render()
    {
        $data = $this->updatedData;
        return view('livewire.app.dashboard', [
            'data' => $data,
            'chartData' => [
                'approved' => $data['approved'] ?? 0,
                'pending' => $data['pending'] ?? 0,
                'suspended' => $data['rejected'] ?? 0,
            ],
        ])->layout('layouts.app');
    }
}
