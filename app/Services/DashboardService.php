<?php

namespace App\Services;

use App\Models\User;
use App\Models\Unit;

class DashboardService
{
    public function data(User $user): array
    {
        return match ($user->role) {
            'admin' => $this->adminDashboard($user),
            'officer' => $this->officerDashboard($user->unit),
            'student' => $this->studentDashboard($user),
            default => [],
        };
    }

    /**
     * ADMIN DASHBOARD
     */
    protected function adminDashboard(User $user): array
    {
        return [
            'total_users' => User::count(),
            'total_units' => Unit::count(),
        ];
    }

    /**
     * OFFICER DASHBOARD
     */
    public function officerDashboard(?Unit $unit): array
    {
        if (!$unit) {
            return [];
        }

        return [
            'total' => $unit->clearances()->count(),

                'pending' => $unit->clearances()->pending()->count(),
                'approved' => $unit->clearances()->approved()->count(),
                'rejected' => $unit->clearances()->rejected()->count(),

            'recentRequests' => user()->unit->clearanceRequests()->latest()->take(5)->get(),

        ];
    }

    /**
     * STUDENT DASHBOARD
     */
    public function studentDashboard($user): array
    {
        $hasRequests = $user->clearanceRequests()->exists();

        if (!$hasRequests) {
            return [
                'registered' => false,
                'stats' => null,
                'activities' => $user->activities->take(6),
                'clearance_request' => null,
            ];
        }

        $clearances = $user->clearances ?? collect();

        return [
            'registered' => true,
            'stats' => [
                'clearanceUnits' => $clearances,
                'total' => $clearances->count(),
                'approved' => $clearances
                    ->where('status', \App\Enums\ClearanceStatus::APPROVED)
                    ->count(),
            ],
            'activities' => $user->activities->take(6),
            'clearance_request' => $user->clearanceRequests->first(),
            'user' => $user,
        ];
    }
}
