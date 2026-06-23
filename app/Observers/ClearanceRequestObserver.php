<?php

namespace App\Observers;

use App\Enums\ClearanceStatus;
use App\Models\ClearanceRequest;
use App\Models\Unit;

class ClearanceRequestObserver
{
    public function creating(ClearanceRequest $request){

    }

    /**
     * Create clearance records for all required units when a clearance
     * request is submitted.
     **
     * Each generated clearance is initialized with a pending status and
     * linked to the newly created clearance request.
     *
     * @param \App\Models\ClearanceRequest $request
     * @return void
     */

    public function created(ClearanceRequest $request) :void
    {


        $departmentUnit = $request->department->unit;
        $facultyUnit = $request->department->faculty->unit;

        $units = Unit::whereNotIn('type', ['department', 'faculty'])->get()
                 ->push($departmentUnit)
                 ->push($facultyUnit);

        $request->clearances()->createMany(
            $units->map(fn ($unit) => [
                'unit_id' => $unit->id,
                'status' => ClearanceStatus::PENDING,
            ])->toArray()
        );
    }

    public function updated(ClearanceRequest $request)
    {
        $request->clearances()->where('status', ClearanceStatus::REJECTED)
            ->update(['status' => ClearanceStatus::REAPPLY]);

    }
}
