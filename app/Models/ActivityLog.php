<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'causer_id',
        'subject_type',
        'subject_id',
        'action',
        'description',
        'properties',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public function causer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    // --- Query scopes, used by the admin log viewer's filters ---

    public function scopeAction(Builder $query, string $action): Builder
    {
        return $query->where('action', $action);
    }

    public function scopeActionLike(Builder $query, string $prefix): Builder
    {
        // e.g. scopeActionLike('clearance.') catches clearance.approved,
        // clearance.rejected, clearance.status_changed, etc. in one filter.
        return $query->where('action', 'like', "{$prefix}%");
    }

    public function scopeCausedBy(Builder $query, User|int $user): Builder
    {
        return $query->where('causer_id', $user instanceof User ? $user->id : $user);
    }

    public function scopeForSubject(Builder $query, Model $subject): Builder
    {
        return $query->where('subject_type', $subject->getMorphClass())
            ->where('subject_id', $subject->getKey());
    }

    public function scopeBetweenDates(Builder $query, ?string $from, ?string $to): Builder
    {
        return $query
            ->when($from, fn ($q) => $q->whereDate('created_at', '>=', $from))
            ->when($to, fn ($q) => $q->whereDate('created_at', '<=', $to));
    }
}
