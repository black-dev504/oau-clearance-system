<?php

namespace App\Observers;

use App\Enums\ClearanceStatus;
use App\Models\Clearance;
use App\Models\Unit;
use App\Services\ClearanceService;

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

    public function updated(Clearance $clearance)
    {
        $user = $clearance->clearanceRequest->user;
        $clearanceRequest = $clearance->clearanceRequest;

        if (!$clearance->isDirty('status')) {
            return;
        }

        if ($clearance->status === ClearanceStatus::APPROVED) {

            $currentUnit = $clearance->unit;

            $studentUnits = app(ClearanceService::class)->getStudentUnits($clearanceRequest);


            $nextUnit = $studentUnits->where('order', '>', $currentUnit->order)->first();

            if ($nextUnit) {
                Clearance::where('clearance_request_id', $clearance->clearance_request_id)
                    ->where('unit_id', $nextUnit->id)
                    ->update(['status' => ClearanceStatus::PENDING]);
            }
        }
            $clearance->activities()->create([
                'user_id' => $user->id,
                'type' => $clearance->status,
                'title' => "{$clearance->unit->name} clearance status changed to  {$clearance->status->label()}",
            ]);

            $allUnitsApproved = $clearanceRequest->clearances()
                    ->where('status', ClearanceStatus::APPROVED)
                    ->count() === $clearanceRequest->required_units_count;

            if ($allUnitsApproved) {
                $clearanceRequest->update(['status' => ClearanceStatus::APPROVED]);
            }

    }
}
