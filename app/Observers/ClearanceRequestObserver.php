<?php

namespace App\Observers;

use App\Enums\ClearanceStatus;
use App\Models\ClearanceRequest;
use App\Models\Unit;

class ClearanceRequestObserver
{
    public function creating(ClearanceRequest $request){

    }

    public function created(ClearanceRequest $request){
        $units = Unit::all();

        $request->clearances()->createMany(
            $units->map(fn ($unit) => [
                'unit_id' => $unit->id,
                'status' => ClearanceStatus::PENDING,
            ])->toArray()
        );
    }
}
