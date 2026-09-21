<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        activity()
            ->performedOn($user)
            ->log('user.created', "{$user->name} account created with role \"{$user->role}\"");
    }

    public function updated(User $user): void
    {
        if ($user->isDirty('role')) {
            activity()
                ->performedOn($user)
                ->withChange('role', $user->getOriginal('role'), $user->role)
                ->log('user.role_changed', "{$user->name}'s role changed from \"{$user->getOriginal('role')}\" to \"{$user->role}\"");
        }

        if ($user->isDirty('unit_id')) {
            activity()
                ->performedOn($user)
                ->withChange('unit_id', $user->getOriginal('unit_id'), $user->unit_id)
                ->log('user.unit_reassigned', "{$user->name} reassigned to a different unit");
        }

        if ($user->isDirty('status')) {
            $action = $user->status === 'deactivated' ? 'user.deactivated' : 'user.activated';

            activity()
                ->performedOn($user)
                ->withChange('status', $user->getOriginal('status'), $user->status)
                ->log($action, "{$user->name} account marked \"{$user->status}\"");
        }
    }

    public function deleted(User $user): void
    {
        activity()
            ->performedOn($user)
            ->log('user.deleted', "{$user->name} account deleted");
    }
}
