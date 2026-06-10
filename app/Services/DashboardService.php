<?php

namespace App\Services;

use App\Enums\ClearanceStatus;
use App\Models\Activity;
use App\Models\Clearance;
use App\Models\ClearanceRequest;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Str;

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
            'total_requests' => ClearanceRequest::count(),
            'total_officers' => User::where('role', 'officer')->count(),
            'total_units' => Unit::count(),
            'recentRequests' => ClearanceRequest::latest()->take(8)->get(),
            'units_metrics' => Unit::all()
                ->map(fn ($unit) => [
                    'name' => $unit->name,
                    'metric' => $this->unitMetrics($unit),
                ])
                ->sortByDesc('metric')
                ->values(),
            'pending_requests' =>  Unit::all()->map(fn ($unit) => [
               'unit_name' => Str::title($unit->name),
               'count' => $unit->clearances()->pending()->count()
            ]),
        ];
    }

    protected function unitMetrics(Unit $unit): array
    {
       return [
              'total' => $unit->clearances()->count(),
              'processed' => $unit->clearances()->processed()->count(),
              'avg_processing_time' => $this->avgProcessingTime($unit),
              'approval_rate' => $this->approvalRate($unit),
       ];
    }

    protected function avgProcessingTime($unit)
    {
        $time_in_sec = $unit->clearances()
            ->processed()
            ->selectRaw('AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) as avg_time')
            ->value('avg_time');

        return $this->formatTime($time_in_sec);
    }

    protected function approvalRate($unit)
    {
        $total = $unit->clearances()
            ->whereIn('status', [ClearanceStatus::APPROVED, ClearanceStatus::REJECTED])
            ->count();

        $approved = $unit->clearances()
            ->where('status', ClearanceStatus::APPROVED)
            ->count();

        return $total > 0 ? ($approved / $total) * 100 : 0;
    }

    function formatTime($seconds)
    {
        if ($seconds >= 86400) {
            return round($seconds / 86400, 1) . ' days';
        }

        if ($seconds >= 3600) {
            return round($seconds / 3600, 1) . ' hours';
        }

        return round($seconds / 60, 1) . ' minutes';
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
                'recentAnnouncements' => $unit->announcements()->latest()->take(5)->get(),
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
