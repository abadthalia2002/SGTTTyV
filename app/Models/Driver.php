<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'document_type_id',
        'document_number',
        'name',
        'surname',
        'dni',
        'license_number',
        'license_type',
        'transport_association_id',
        'partner_id',
    ];

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function transportAssociation(): BelongsTo
    {
        return $this->belongsTo(TransportAssociation::class);
    }

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class);
    }
}
