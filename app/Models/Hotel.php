<?php

namespace App\Models;

use App\Models\Habitacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public $table = 'hoteles';
    public $fillable = [
        "nombre",
        "direccion",
        "ciudad",
        "nit",
        "num_habitaciones",
    ];

    /**
     * @return HasMany
     */
    public function habitaciones(): HasMany
    {
        return $this->hasMany(Habitacion::class);
    }
}
