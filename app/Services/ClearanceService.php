<?php

namespace App\Services;

use App\Enums\ClearanceStatus;
use App\Models\ClearanceRequest;
use App\Models\User;

class ClearanceService
{
    public function requests(User $user,  $status = null, $searchValue= '', $sort = 'Oldest')
    {
        $query = ClearanceRequest::query();

        if ($user->hasRole('officer')) {
            $query->whereHas('clearances', function ($q) use ($user, $status) {
                $q->where('unit_id', $user->unit_id)
                    ->when($status, fn ($q) => $q->where('status', $status)
                    );

            });
        }

        if ($user->hasRole('admin')) {
            $query->when($status, fn ($q) => $q->where('status', $status));
        }

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', '%'.$searchValue.'%')
                    ->orWhere('matric_no', 'like', '%'.$searchValue.'%');
            });

        }

        $query = match ($sort) {
            'Newest' => $query->latest(),
            'Oldest' => $query->oldest(),
            'Name'   => $query->orderBy('name'),
            default  => $query->latest(),
        };

        return $query->paginate(10);

    }

    public function approveClearance(ClearanceRequest $request, User $user)
    {
        $clearance = $request->clearanceForUnit($user->unit_id);

        if (!$clearance) {
            throw new \Exception('Clearance not found for this unit');
        }

        $clearance->update([
            'status' => ClearanceStatus::APPROVED
        ]);

        return $clearance;
    }

    public function rejectClearance(ClearanceRequest $request, User $user, string $remark)
    {
        $clearance = $request->clearanceForUnit($user->unit_id);

        if (!$clearance) {
            throw new \Exception('Clearance not found for this unit');
        }

//        TODO:: validate remark

        $clearance->update([
            'status' => ClearanceStatus::REJECTED,
            'remark' => $remark
        ]);

        return $clearance;
    }

}
