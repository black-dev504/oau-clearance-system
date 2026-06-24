<?php

namespace App\Support;

class UnitType
{
    public static function get(string $type): array
    {
        return config("units.types.$type", config('units.default'));
    }

    public static function label(string $type): string
    {
        return static::get($type)['label'];
    }

    public static function accent(string $type): string
    {
        return static::get($type)['accent'];
    }

    public static function all(): array
    {
        return config('units.types');
    }
}
