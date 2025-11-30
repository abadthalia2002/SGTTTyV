<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationRecord extends Model
{
     protected $fillable = [
        // DATOS GENERALES
        'date',
        'time',
        'location',
        'transport_association_id',

        // CONDUCTOR
        'driver_id',
        'driver_name',
        'driver_address',
        'driver_document_number',

        // LICENCIA
        'license_class',
        'license_number',

        // VEHÍCULO
        'vehicle_plate',
        'engine_number',
        'vehicle_class',
        'vehicle_brand',
        'vehicle_registration_number',
        'vehicle_color',
        'registration_date',

        // PROPIETARIO
        'partner_id',
        'partner_name',
        'partner_address',
        'partner_document_number',

        // INFRACCIONES
        'law_27181',
        'law_27189',
        'ds_017_09_mtc',
        'ds_055_10_mtc',

        'om_number_1',
        'om_number_2',

        // EXTRA
        'additional_information',
        'driver_observations',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',

        // Booleans de infracciones
        'law_27181' => 'boolean',
        'law_27189' => 'boolean',
        'ds_017_09_mtc' => 'boolean',
        'ds_055_10_mtc' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    public function transportAssociation(): BelongsTo
    {
        return $this->belongsTo(TransportAssociation::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver(): BelongsTo
    {
        /**
         * driver_id es un string en tu BD, no un foreignId real.
         * Pero igual puedes relacionarlo manualmente:
         */
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
}
