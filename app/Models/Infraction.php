<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infraction extends Model
{
    protected $fillable = [
        'code',
        'description',
        'type',
        'sanction_percentage',
        'complementary_measure',
    ];
}
