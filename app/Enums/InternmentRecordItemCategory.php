<?php

namespace App\Enums;

enum InternmentRecordItemCategory: string
{
    case EXTERIOR = 'exterior';
    case INTERIOR = 'interior';
    case SISTEMA = 'sitema';

    public function label(): string
    {
        return match ($this) {
            self::EXTERIOR => 'Aspecto Exterior',
            self::INTERIOR => 'Aspecto Interior',
            self::SISTEMA => 'Sitema electrico',
        };
    }
}
