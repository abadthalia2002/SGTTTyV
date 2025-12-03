<?php

namespace App\Enums;

enum StatusControlRecordEnum: string
{
    case PENDIENTE = 'pendiente';
    case PAGADO = 'pagado';

    public function label(): string
    {
        return match ($this) {
            self::PENDIENTE => 'Pendiente',
            self::PAGADO   => 'Pagado',
        };
    }
}
