<?php

namespace App\Livewire;

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


    #[On('form-submitted')]
    public function submitted()
    {
        $this->registered = true;

    }

    public function mount()
    {
        $this->registered = auth()->user()?->clearanceRequests()->exists();    }

    public function render()
    {
        return view('livewire.app.student')
            ->layout('layouts.student', ['user' => auth()->user()]);
    }
}
