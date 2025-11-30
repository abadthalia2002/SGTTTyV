<?php

namespace App\Models;

use App\Enums\TargetInfractionEnum;
use App\Enums\TypeInfractionEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infraction extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'target',
        'code',
        'description',
        'type',
        'sanction_percentage',
        'complementary_measure',
        'amount',
    ];

    protected $casts = [
        'target' => TargetInfractionEnum::class,
        'type' => TypeInfractionEnum::class,
    ];
}
