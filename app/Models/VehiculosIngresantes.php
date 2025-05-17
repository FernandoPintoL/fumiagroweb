<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculosIngresantes extends Model
{
    /** @use HasFactory<\Database\Factories\VehiculosIngresantesFactory> */
    use HasFactory;
    protected $table = "vehiculos_ingresantes";
    protected $primaryKey = "id";
    protected $fillable = [
        'vehiculo_id',
        'ingreso_id',
        'created_at',
        'updated_at'
    ];
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }
    public function ingresante()
    {
        return $this->belongsTo(Ingresantes::class, 'ingreso_id');
    }

}
