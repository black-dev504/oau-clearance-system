<?php

namespace App\Support;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ActivityLogger
{
    protected ?User $causer = null;
    protected ?Model $subject = null;
    protected array $properties = [];

    public function causedBy(?User $user): static
    {
        $this->causer = $user;

        return $this;
    }

    public function performedOn(?Model $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function withProperties(array $properties): static
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Convenience for the common "field changed from X to Y" case —
     * e.g. a role change, a status change, a unit reassignment.
     */
    public function withChange(string $field, mixed $old, mixed $new): static
    {
        $this->properties[$field] = ['old' => $old, 'new' => $new];

        return $this;
    }

    public function log(string $action, string $description): ActivityLog
    {
        return ActivityLog::create([
            'causer_id' => $this->causer?->id ?? auth()->id(),
            'subject_type' => $this->subject?->getMorphClass(),
            'subject_id' => $this->subject?->getKey(),
            'action' => $action,
            'description' => $description,
            'properties' => $this->properties ?: null,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }
}
