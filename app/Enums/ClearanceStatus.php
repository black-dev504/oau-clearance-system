<?php

namespace App\Enums;

enum ClearanceStatus:int
{
    case PENDING = 0;
    case APPROVED = 1;

    case REJECTED = 2;

    case REAPPLY = 3;

    case SUBMITTED = 4;


    public  function label()
    {
       return match ($this) {
           self::PENDING => __('Pending'),
           self::APPROVED => __('Approved'),
           self::REJECTED => __('Rejected'),
           self::REAPPLY => __('Reapply'),
           self::SUBMITTED => __('Submitted'),
       };

    }

    public function classes()
    {
            return match ($this) {
                self::APPROVED => [
                    'text' => 'text-green-700',
                    'dot' => 'bg-green-700',
                    'bg' => 'bg-green-100',
                ],
                self::REJECTED => [
                    'text' => 'text-orange-700',
                    'dot' => 'bg-orange-700',
                    'bg' => 'bg-orange-100',
                ],
                self::PENDING => [
                    'text' => 'text-yellow-700',
                    'dot' => 'bg-yellow-700',
                    'bg' => 'bg-yellow-100',
                ],

                self::REAPPLY => [
                    'text' => 'text-purple-700',
                    'dot' => 'bg-purple-700',
                    'bg' => 'bg-purple-100',
                ],
            };

    }

    public static function stringToEnum(string $status): self
    {
        return match (strtolower($status)) {
            'approved' => self::APPROVED,
            'rejected' => self::REJECTED,
            'pending' => self::PENDING,
            'reapply' => self::REAPPLY,
            default => throw new \InvalidArgumentException("Invalid status: $status"),
        };
    }

}
