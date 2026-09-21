<?php

namespace App\Livewire;

use App\Models\ActivityLog;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityLogs extends Component
{
    use WithPagination;

    #[Url]
    public string $actionFilter = '';

    #[Url]
    public ?int $causerFilter = null;

    #[Url]
    public string $from = '';

    #[Url]
    public string $to = '';

    #[Url]
    public string $search = '';

    public function updating(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset(['actionFilter', 'causerFilter', 'from', 'to', 'search']);
    }

    public function render()
    {
        $logs = ActivityLog::query()
            ->with(['causer', 'subject'])
            ->when($this->actionFilter, fn ($q) => $q->actionLike($this->actionFilter))
            ->when($this->causerFilter, fn ($q) => $q->causedBy($this->causerFilter))
            ->when($this->from || $this->to, fn ($q) => $q->betweenDates($this->from ?: null, $this->to ?: null))
            ->when($this->search, fn ($q) => $q->where('description', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(25);

        return view('livewire.app.admin.activity-logs', [
            'logs' => $logs,
            'actionGroups' => [
                'auth.' => 'Authentication',
                'clearance.' => 'Clearance',
                'user.' => 'User Management',
                'unit.' => 'Unit / Department',
            ],
            'admins' => User::query()->whereIn('role', ['officer', 'admin'])->get(),
        ]);
    }
}
