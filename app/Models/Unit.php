<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function clearanceRequests()
    {
        return $this->hasManyThrough(
            ClearanceRequest::class,
            Clearance::class,
            'unit_id', // Foreign key on clearances table
            'id', // Foreign key on clearance_requests table
            'id', // Local key on units table
            'clearance_request_id'
        );
    }

    public function clearances()
    {
        return $this->hasMany(Clearance::class);
    }

}
