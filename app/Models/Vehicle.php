<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'plate',
        'brand',
        'model',
        'type',
        'partner_id',
        'driver_id',
        'transport_association_id',
    ];

    public function transportAssociation(): BelongsTo
    {
        return $this->belongsTo(TransportAssociation::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
