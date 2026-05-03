<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{

  protected $guarded = ['id'];

  protected $casts = [
      'status' => ClearanceStatus::class,
  ];
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeReapply($query)
    {
        return $query->where('status', 'reapply');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
