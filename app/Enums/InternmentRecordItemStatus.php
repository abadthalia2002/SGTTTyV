<?php

namespace App\Enums;

enum InternmentRecordItemStatus: string
{
    case B = 'B';
    case R = 'R';
    case D = 'D';
    case NT = 'N/T';

    public function label(): string
    {
        return match ($this) {
            self::B => 'Bueno',
            self::R => 'Regular',
            self::D => 'Deteriorado',
            self::NT => 'No tiene',
        };
    }
}
