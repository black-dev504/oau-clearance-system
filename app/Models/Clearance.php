<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use App\Observers\ClearanceObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy(ClearanceObserver::class)]
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

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
