<?php

namespace App\Livewire;

use App\Models\Hostel;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
