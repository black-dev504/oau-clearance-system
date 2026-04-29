<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClearanceRequest extends Model
{
    protected $guarded = ['id'];


    /**
     * populates the clearance table on every clearance request made
     */
    protected static function booted()
    {
        static::created(function ($request) {

            $units = Unit::all();

            $request->clearances()->createMany(
                $units->map(fn ($unit) => [
                    'unit_id' => $unit->id,
                    'status' => 'pending',
                ])->toArray()
            );
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clearances()
    {
        return $this->hasMany(Clearance::class);
    }
}
