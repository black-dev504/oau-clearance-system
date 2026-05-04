<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
     protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'type' => ClearanceStatus::class,
    ];
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function subject()
     {
         return $this->morphTo();
     }
}
