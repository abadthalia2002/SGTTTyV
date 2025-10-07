<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'abbreviation',
        'number_min_length',
        'number_max_length',
        'number_regex',
    ];
}
