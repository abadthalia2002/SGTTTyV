<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransportAssociation extends Model
{
    protected $fillable = [
        'document_number',
        'name',
        'description',
        'location',
        'partner_id',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function partners()
    {
        return $this->hasMany(\App\Models\Partner::class);
    }

    public function drivers()
    {
        return $this->hasMany(\App\Models\Driver::class);
    }
}
