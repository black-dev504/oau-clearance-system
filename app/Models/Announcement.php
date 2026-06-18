<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $guarded = ['id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function getPriorityClassesAttribute(): array
    {
        return match ($this->priority) {
            'high' => [
                'bg' => 'bg-red-100',
                'dot' => 'bg-red-500',
                'text' => 'text-red-800',
                'icon' => 'text-red-500',
                'border' => 'border-red-500',
            ],

            'medium' => [
                'bg' => 'bg-yellow-100',
                'dot' => 'bg-yellow-500',
                'text' => 'text-yellow-800',
                'icon' => 'text-yellow-500',
                'border' => 'border-yellow-500',
            ],

            'low' => [
                'bg' => 'bg-green-100',
                'dot' => 'bg-green-500',
                'text' => 'text-green-800',
                'icon' => 'text-green-500',
                'border' => 'border-green-500',
            ],

            default => [
                'bg' => 'bg-gray-100',
                'dot' => 'bg-gray-500',
                'text' => 'text-gray-800',
                'icon' => 'text-gray-500',
                'border' => 'border-gray-500',
            ],
        };
    }
}
