<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculos extends Model
{
    /** @use HasFactory<\Database\Factories\TipoVehiculosFactory> */
    use HasFactory;
    protected $table = "tipo_vehiculos";
    protected $primaryKey = "id";
    protected $fillable = [
        'sigla',
        'detalle',
        'created_at',
        'updated_at'
    ];
}
