<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    const TYPE_HABITACION_ESTANDAR = 'ESTANDAR';
    const TYPE_HABITACION_JUNIOR = 'JUNIOR';
    const TYPE_HABITACION_SUIT = 'SUIT';

    public $table = "habitaciones";
    
    public $fillable = [
        "cantidad",
        "tipo_habitacion",
        "tipo_acomodacion",
        "hotel_id"
    ];
}
