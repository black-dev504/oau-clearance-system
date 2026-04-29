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
        return $this->hasMany(ClearanceRequest::class);
    }
}
