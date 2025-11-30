<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'abbreviation',
        'number_min_length',
        'number_max_length',
        'number_regex',
    ];
}
