<?php

namespace App\Services;

use App\Models\ClearanceRequest;

class ClearanceService
{
    public function requests($status = null, $searchValue= '')
    {
        if (auth()->user()->hasRole('admin')) {

        }

        if (auth()->user()->hasRole('officer')) {
            $query = ClearanceRequest::query()
                ->whereHas('clearances', function ($query) {
                    $query->where('unit_id', user()->unit_id)
                        ->when($status != null, fn($q) => $q->where('status', $status))
                        ->when(! empty($this->search),
                            fn ($query) => $query->where('name', 'like', '%'.$searchValue.'%')
                                ->orWhere('matric_no', 'like', '%'.$searchValue.'%')
                        );
                });

            return  $query = match ($this->sortValue) {
                'Newest' => $query->latest(),
                'Oldest' => $query->oldest(),
                'Name' => $query->orderBy('name'),
                default => $query->latest()
            };
        }
    }
}
