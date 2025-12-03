<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\StatusControlRecordEnum;

class ControlRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transport_association_id',

        'date',
        'time',
        'intervention_place',
        'name',
        'service_mode',

        // Vehículo
        'vehicle_id',
        'vehicle_authorization_number',
        'vehicle_plate',

        // Ruta
        'route_origin',
        'route_destination',

        // Conductor
        'driver_id',
        'driver_name',
        'driver_license_number',
        'driver_document_number',
        'driver_license_class',
        'driver_license_category',

        // Infracción
        'infraction_id',
        'infraction_code_detected',
        'detected_non_compliance_code',
        'verification_findings',

        // Manifestación
        'infraction_description_location',
        'admin_statement',

        'payment_amount',
        'status',
    ];

    protected $casts = [
        'status' => StatusControlRecordEnum::class,
    ];

    public function transportAssociation(): BelongsTo
    {
        return $this->belongsTo(TransportAssociation::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function infraction(): BelongsTo
    {
        return $this->belongsTo(Infraction::class);
    }

    public static function lastRecordsForDriver($driverId, $days = 30, $limit = 3)
    {
        return self::where('driver_id', $driverId)
            ->where('created_at', '>=', now()->subDays($days))
            ->latest('created_at')
            ->take($limit)
            ->get();
    }
}
