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
        return $query->where('status', ClearanceStatus::PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', ClearanceStatus::APPROVED);
    }

    public function scopeReapply($query)
    {
        return $query->where('status', ClearanceStatus::REAPPLY);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', ClearanceStatus::REJECTED);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    public function clearanceRequests()
    {
        return $this->belongsTo(ClearanceRequest::class, 'clearance_request_id');
    }
}
