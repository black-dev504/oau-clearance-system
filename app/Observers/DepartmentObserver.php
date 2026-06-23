<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\Unit;
use Illuminate\Support\Str;

class DepartmentObserver
{
    public function created(Department $department)
    {


        $unit = Unit::create([
            'name' => $department->name,
            'slug' => Str::slug($department->name),
            'type' => 'department',
        ]);

        $department->update(['unit_id' => $unit->id]);
    }
}
