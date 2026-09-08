<?php

namespace App\Livewire;

use App\Models\Hostel;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class HostelsTable extends Component
{
    public ?string $name;
    public ?string $code;
    public ?string $warden;
    public $gender;
    public ?string $search =null;
    public ?int $deleteId = null;
    public ?bool $editing = false;
    public $selectedHostel;


    public function addHostel()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:4|unique:hostels,code',
            'gender' => 'required|string|in:male,female',
            'warden' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($validated) {
            $hostel = Hostel::create(
                [
                    ...$validated,
                    'status' => 'active',
                    'slug' => Str::slug($this->name),

                ]);

            $unit = Unit::create([
                'name' => $hostel->name,
                'slug' => Str::slug($hostel->name),
                'order' => config('units.types')['hostel']['order'],
                'type' => 'hostel',
                'code' => $hostel->code,
            ]);

            $hostel->update(['unit_id' => $unit->id]);
        });

        $this->js('$flux.modal("add-hostel").close()');

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Hostel added successfully'
        ]);

    }

    public function deleteHostel()
    {
        $hostel = Hostel::findOrFail($this->deleteId);
        $hostel->delete();

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Hostel deleted successfully'
        ]);

        $this->js('$flux.modal("delete-hostel").close();');
    }

    public function openEditMode($id)
    {
        $this->editing = true;
        $this->selectedHostel = Hostel::findOrFail($id);
        $this->name = $this->selectedHostel->name;
        $this->code = $this->selectedHostel->code;
        $this->warden = $this->selectedHostel->warden;
        $this->gender = $this->selectedHostel->gender;

        $this->dispatch('modal-show', name: 'add-hostel');
    }

    public function updateHostel()
    {
        $hostel = Hostel::findOrFail($this->selectedHostel->id);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                'string',
                'max:4',
                Rule::unique('hostels', 'code')->ignore($hostel->id),
            ],
            'warden' => [
                'required',
                'string',
                'max:255',
            ],
            'gender' => 'required|string|in:male,female'
        ]);

        DB::transaction(function () use ($validated, $hostel) {
            $hostel->update($validated);

            if ($hostel->wasChanged(['name', 'code'])) {
                Unit::where('id', $hostel->unit_id)->update([
                    'name' => $hostel->name,
                    'slug' => Str::slug($hostel->name),
                    'code' => $hostel->code,
                ]);
            }
        });
        $this->editing = false;
        $this->selectedHostel = null;
        $this->js('$flux.modal("add-hostel").close();');
    }

    public function resetModal()
    {
        $this->editing = false;
        $this->selectedHostel = null;
        $this->name = null;
        $this->code = null;
        $this->warden = null;
        $this->gender = null;
    }

    public function getHostelsProperty()
    {
        $query = Hostel::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%')
                ->orWhere('warden', 'like', '%' . $this->search . '%');
        }

        return $query;
    }
    public function render()
    {

        return view('livewire.hostels-table',
        [
            'hostels' => $this->hostels->paginate()
        ]
        );
    }
}
