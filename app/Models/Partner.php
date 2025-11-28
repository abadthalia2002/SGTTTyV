<?php

namespace App\Models;

use App\Enums\CivilStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partner extends Model
{
    protected $fillable = [
        'id',
        'document_type_id',
        'document_number',
        'name',
        'address',
        'phone',
        'email',
        'civil_status',
        'transport_association_id',
    ];
    

    protected $casts = [
        'civil_status' => CivilStatusEnum::class,
    ];

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function transportAssociation(): BelongsTo
    {
        return $this->belongsTo(TransportAssociation::class);
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, 'partner_id');
    }
}
