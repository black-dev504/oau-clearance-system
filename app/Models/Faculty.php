<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty extends Model
{
    use HasFactory;

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
