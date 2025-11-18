<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InternmentRecord extends Model
{
    protected $fillable = [
        'transport_association_id',
        'partner_id',
        'partner_name',
        'driver_id',
        'driver_name',
        'vehicle_id',
        'plate',
        'engine_number',
        'serial_number',
        'model',
        'brand',
        'vehicle_class',
        'color',
        'body_type',
        'manufacturing_year',
        'pnp_ticket',
        'infraction_comisaria',
        'infraction_id',
        'observation',
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

    public function items(): HasMany
    {
        return $this->hasMany(InternmentRecordItem::class);
    }

    public function interiorItems()
    {
        return $this->hasMany(InternmentRecordItem::class)->where('category', 'interior');
    }

    public function exteriorItems()
    {
        return $this->hasMany(InternmentRecordItem::class)->where('category', 'exterior');
    }

    public function electricalSystemsItems()
    {
        return $this->hasMany(InternmentRecordItem::class)->where('category', 'sitema');
    }
}
