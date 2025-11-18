<?php

namespace App\Models;

use App\Enums\InternmentRecordItemCategory;
use App\Enums\InternmentRecordItemStatus;
use Illuminate\Database\Eloquent\Model;

class InternmentRecordItem extends Model
{
    protected $fillable = [
        'internment_record_id',
        'category',
        'item',
        'status',
    ];
    protected $casts = [
        'category' =>  InternmentRecordItemCategory::class,
        'status' =>  InternmentRecordItemStatus::class,

    ];

    public static function exterior(): array
    {
        return [
            'Adornos',
            'Antenas',
            'Espejo lateral derecho',
            'Espejo lateral izquierdo',
            'Estado de pintura exterior',
            'Guardafango delantero',
            'Guardafango posterior derecho',
            'Guardafango posterior izquierdo',
            'Limpia parabrisas',
            'Llantas delanteras',
            'Llantas posteriores',
            'Estado de chasis vehicular',
            'Parabrisas y/o cobertor delantero',
            'Parachoque',
        ];
    }

    public static function interior(): array
    {
        return [
            'Tablero',
            'Cinturones de seguridad',
            'Tapicería',
            'Luces interiores',
            'Bocina',
            'Pedales',
            'Manijas',
            'Espejo retrovisor',
        ];
    }

    public static function electricalSystems(): array
    {
        return [
            "Claxon",
            "Flasher",
            "Bateria",
            "Micas luces delanteras",
            "Micas luces posteriores",
            "Micas luces direccionales izq."
        ];
    }

    public static function statusOptions(): array
    {
        return [
            'B'   => 'Bueno',
            'R'   => 'Regular',
            'D'   => 'Deteriorado',
            'N/T' => 'No tiene',
        ];
    }

    public function record()
    {
        return $this->belongsTo(InternmentRecord::class, 'internment_record_id');
    }
}
