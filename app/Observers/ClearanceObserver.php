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
            'user_id' => user()?->id ,
            'type' => ClearanceStatus::SUBMITTED,
            'title' => "{$clearance->unit->name} clearance requested submitted",
        ]);

        activity()
            ->performedOn($clearance)
            ->log(
                'clearance.submitted',
                "{$clearance->unit->name} clearance requested for {$clearance->clearanceRequest->user->name}"
            );
    }

    public function updated(Clearance $clearance)
    {
        if (!$clearance->isDirty('status')) {
            return;
        }

        $clearanceRequest = $clearance->clearanceRequest;
        $user = $clearanceRequest->user;


        $studentClearances = $clearanceRequest->clearances()->with('unit')->get()
            ->sortBy(fn ($c) => $c->unit->order);

        if ($clearance->status === ClearanceStatus::APPROVED) {
            $currentUnit = $clearance->unit;

            $nextClearance = $studentClearances
                ->first(fn ($c) => $c->unit->order > $currentUnit->order);

            if ($nextClearance) {
                $nextClearance->update(['status' => ClearanceStatus::PENDING]);
            }
        }

        $clearance->activities()->create([
            'user_id' => $user->id,
            'type' => $clearance->status,
            'title' => "{$clearance->unit->name} clearance status changed to {$clearance->status->label()}",
        ]);

        activity()
            ->performedOn($clearance)
            ->withChange('status', $clearance->getOriginal('status'), $clearance->status)
            ->log(
                'clearance.status_changed',
                "{$clearance->unit->name} clearance for {$user->name} changed to {$clearance->status->label()}"
            );

        $allUnitsApproved = $studentClearances->every(
            fn ($c) => $c->id === $clearance->id ? $clearance->status === ClearanceStatus::APPROVED : $c->status === ClearanceStatus::APPROVED
        );

        $clearanceRequest->update([
            'status' => $allUnitsApproved ? ClearanceStatus::APPROVED : ClearanceStatus::PENDING,
        ]);

        if ($allUnitsApproved) {
            activity()
                ->performedOn($clearanceRequest)
                ->log('clearance.fully_approved', "{$user->name} fully cleared — all units approved");
        }
    }}
