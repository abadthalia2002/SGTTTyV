<?php

namespace App\Models;

use App\Enums\CivilStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partner extends Model
{
    protected $fillable = [
        'document_type_id',
        'document_number',
        'name',
        'address',
        'phone',
        'email',
        'civil_status',
    ];
    

    protected $casts = [
        'civil_status' => CivilStatusEnum::class,
    ];

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }
}
