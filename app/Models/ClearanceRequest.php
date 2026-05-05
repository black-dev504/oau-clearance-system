<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use App\Observers\ClearanceRequestObserver;
use Database\Factories\ClearanceRequestFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

#[ObservedBy(ClearanceRequestObserver::class)]
class ClearanceRequest extends Model
{

    /** @use HasFactory<ClearanceRequestFactory> */
    use HasFactory, Notifiable;
    protected $guarded = ['id'];

    protected $casts = [
        'status' => ClearanceStatus::class,
    ];

    /**
     * populates the clearance table on every clearance request made
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clearances()
    {
        return $this->hasMany(Clearance::class);
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
