<?php

namespace App\Livewire;

use App\Http\Requests\DashboardRequest;
use App\Models\ClearanceRequest;
use http\Env\Request;
use Livewire\Component;

class Dashboard extends Component
{

    public $unit;
    public $selectedRequest;



    public function openModal($requestId)
    {
        $this->reset('selectedRequest');
        $this->selectedRequest = ClearanceRequest::findorFail( $requestId);
    }

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
            'recentRequests' => user()->unit->clearanceRequests()->latest()->take(5)->get(),

        ])->layout('layouts.app');
    }
}
