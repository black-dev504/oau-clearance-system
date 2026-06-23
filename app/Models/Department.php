<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function faculty():BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function clearanceRequests():HasMany
    {
        return $this->hasMany(ClearanceRequest::class);
    }
}
