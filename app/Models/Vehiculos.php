<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    /** @use HasFactory<\Database\Factories\VehiculosFactory> */
    use HasFactory;
    protected $table = "vehiculos";
    protected $primaryKey = "id";
    protected $fillable = [
        'placa',
        'detalle',
        'tipo_vehiculo_id',
        'created_at',
        'updated_at'
    ];
    public function galeria()
    {
        return $this->hasMany(GaleriaVehiculos::class, 'vehiculo_id');
    }
}
