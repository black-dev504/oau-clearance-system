<?php

namespace App\Livewire;

use App\Models\ClearanceRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class OfficerManagement extends Component
{
    public  string $first_name;
    public string $last_name;
    public string $email='';
    public int $unit_id;
    public  string$password;
    public bool $editing = false;
    public  $selectedOfficer;

    public function registerNewOfficer()
    {
        $validated =  $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'unit_id' => 'required|exists:units,id',
            'password' => 'required|string|min:8',

        ]);


        User::create([
            ...$validated,
            'role' => 'officer',
        ]);
        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Officer registered successfully.'
        ]);

        $this->js('$flux.modal("add-officer").close()');

        $this->reset(['first_name', 'last_name', 'email', 'unit_id', 'password']);
    }

    public function openEditMode($officer_id)
    {
        $this->editing = true;
        $this->selectedOfficer = User::findOrFail($officer_id);
        $this->first_name = $this->selectedOfficer->first_name;
        $this->last_name = $this->selectedOfficer->last_name;
        $this->email = $this->selectedOfficer->email;
        $this->unit_id = $this->selectedOfficer->unit_id;
        $this->dispatch('modal-show', name: 'add-officer');
    }

    public function editOfficer()
    {

        $validated =  $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->selectedOfficer->id),
            ],
            'unit_id' => 'required|exists:units,id',
            'password' => 'nullable|string|min:8',
        ]);

        $this->selectedOfficer->update($validated);
        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Officer updated successfully.'
        ]);
        $this->js('$flux.modal("add-officer").close()');
        $this->reset(['first_name', 'last_name', 'email', 'unit_id', 'password']);

    }

    public function resetModal()
    {
        $this->editing = false;
        $this->selectedOfficer = null;

        $this->reset(['first_name', 'last_name', 'email', 'unit_id', 'password']);
    }

    public function generateDefaultPassword()
    {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
        }
        $this->password = $randomPassword;
    }
    public function deleteOfficer($id)
    {
        $officer = User::findOrFail($id);
        $officer->delete();
        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Officer Deleted Successfully.'
        ]);    }

    public function render()
    {
        return view('livewire.app.admin.officer-management', [
            'officers' => User::whereNotNull('unit_id' )->latest()->get()
        ]);
    }
}
