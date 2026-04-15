<?php

namespace App\Livewire;

use Livewire\Component;

class Student extends Component
{

    public $registered = false;

    public function render()
    {
        return view('livewire.app.student')->layout('layouts.student');
    }
}
