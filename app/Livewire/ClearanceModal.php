<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ClearanceModal extends Component
{
    public bool $showModal = false;
    public string $currentForm = 'personalInfo';
    protected array $steps = ['personalInfo', 'contact', 'library', 'review'];
    public array $completedSteps = [
        'personalInfo' => true,
        'contact' => false,
        'library' => false,
        'review' => false,
    ];


    public function next(): void
    {
        $index = array_search($this->currentForm, $this->steps);
        if ($index < count($this->steps) - 1) {
            $this->currentForm = $this->steps[$index + 1];
            $this->completedSteps[$this->steps[$index + 1 ]]= true;

        }
        $this->dispatch('form-changed', form: $this->currentForm);
    }

    public function prev(): void
    {
        $index = array_search($this->currentForm, $this->steps);
        if ($index > 0) {
            $this->currentForm = $this->steps[$index - 1];
            $this->completedSteps[$this->steps[$index ]]= false;

        }

        $this->dispatch('form-changed', form: $this->currentForm);

    }

    public function render()
    {
        return view('livewire.clearance-modal');
    }
}
