<?php

namespace App\Models;

use App\Enums\TargetInfractionEnum;
use App\Enums\TypeInfractionEnum;
use Illuminate\Database\Eloquent\Model;

class Infraction extends Model
{
    protected $fillable = [
        'target',
        'code',
        'description',
        'type',
        'sanction_percentage',
        'complementary_measure',
    ];

    protected $casts = [
        'target' => TargetInfractionEnum::class,
        'type' => TypeInfractionEnum::class,
    ];
}
