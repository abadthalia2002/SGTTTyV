<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportAssociation extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'code',
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

    public function vehicles()
    {
        return $this->hasMany(\App\Models\Vehicle::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $year = now()->year;

            // Buscar el último code del año actual
            $lastCode = static::where('code', 'LIKE', "%-$year")
                ->orderBy('id', 'desc')
                ->value('code');

            if ($lastCode) {
                // Extraer el número: "001-2025" → "001"
                $number = intval(explode('-', $lastCode)[0]) + 1;
            } else {
                $number = 1;
            }

            // Formatear a 3 dígitos
            $formatted = str_pad($number, 3, '0', STR_PAD_LEFT);

            // Guardar el nuevo valor
            $model->code = "$formatted-$year";
        });
    }
}
