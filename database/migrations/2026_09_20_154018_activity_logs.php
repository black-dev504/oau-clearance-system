<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();

            // Who performed the action (nullable — system-triggered events
            // like a queued job or an unauthenticated failed login attempt
            // may have no causer).
            $table->foreignId('causer_id')->nullable()->constrained('users')->nullOnDelete();

            // What the action was done to (polymorphic — a Clearance,
            // a User, a Unit, a Department, etc). Nullable for events
            // that aren't tied to a specific record, e.g. "login".
            $table->nullableMorphs('subject');

            // Short machine-readable action key, e.g. "clearance.approved",
            // "auth.login", "user.role_changed", "unit.deactivated".
            $table->string('action');

            // Human-readable description, e.g. "Bursary clearance approved
            // for John Doe" — this is what gets shown in the admin log viewer.
            $table->string('description');

            // Arbitrary structured context: old/new values on an update,
            // the unit a user was assigned to, etc.
            $table->json('properties')->nullable();

            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();

            $table->timestamps();

            $table->index(['action', 'created_at']);
            $table->index(['causer_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
