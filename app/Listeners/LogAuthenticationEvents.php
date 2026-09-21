<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class LogAuthenticationEvents
{
    public function handleLogin(Login $event): void
    {
        activity()
            ->causedBy($event->user)
            ->performedOn($event->user)
            ->log('auth.login', "{$event->user->name} logged in");
    }

    public function handleLogout(Logout $event): void
    {
        if (! $event->user) {
            return;
        }

        activity()
            ->causedBy($event->user)
            ->performedOn($event->user)
            ->log('auth.logout', "{$event->user->name} logged out");
    }

    public function handleFailedLogin(Failed $event): void
    {
        // No causer — the attempt failed, so we don't have an authenticated
        // user. The attempted identifier (email/username) goes in properties
        // instead, since it's useful for spotting brute-force attempts.
        activity()
            ->withProperties([
                'attempted' => $event->credentials['email'] ?? $event->credentials['username'] ?? null,
            ])
            ->log('auth.failed', 'Failed login attempt');
    }
}
