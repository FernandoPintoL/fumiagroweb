<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaVehiculos extends Model
{
    /** @use HasFactory<\Database\Factories\GaleriaVehiculosFactory> */
    use HasFactory;
    protected $table = "galeria_vehiculos";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'vehiculo_id',
        'photo_path',
        'detalle',
        'created_at',
        'updated_at'
    ];
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }
}
