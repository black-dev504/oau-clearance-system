<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['first_name', 'last_name', 'role', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isOfficer(): bool
    {
        return $this->role == 'officer';
    }

    public function isAdmin():bool
    {
        return $this->role == 'admin';
    }

    public function isStudent():bool
    {
        return $this->role == 'student';
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function clearanceRequests()
    {
        return $this->hasMany(ClearanceRequest::class);
    }

    public function clearances()
    {
        return $this->hasManyThrough(
            Clearance::class,
            ClearanceRequest::class
        );
    }

    public function activities()
    {
        return $this->hasMany(Activity::class)->latest();
    }



    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
