<?php

namespace App\Observers;

use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Str;

class FacultyObserver
{
//    public function created(Faculty $faculty)
//    {
//        $unit = Unit::create([
//            'name' => $faculty->name,
//            'slug' => Str::slug($faculty->name),
//            'type' => 'faculty',
//        ]);
//
//        $faculty->update(['unit_id' => $unit->id]);
//    }
}
