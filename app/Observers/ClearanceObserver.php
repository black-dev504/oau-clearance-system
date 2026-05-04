<?php

namespace App\Observers;

use App\Enums\ClearanceStatus;
use App\Models\Clearance;

class ClearanceObserver
{
    public function creating(Clearance $clearance)
    {

    }

    public function created(Clearance $clearance)
    {
        $clearance->activities()->create([
            'user_id' => user()->id,
            'type' => ClearanceStatus::SUBMITTED,
            'title' => "{$clearance->unit->name} clearance requested submitted",
        ]);
    }
}
