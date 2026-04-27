<?php

namespace App\Livewire;

use http\Env\Request;
use Livewire\Component;

class Dashboard extends Component
{

    public $unit;

    public function mount()
    {
        $this->unit = request()->segment(1);
//        $this->
    }
    public function render()
    {
        return view('livewire.app.dashboard')->layout('layouts.app');
    }
}
