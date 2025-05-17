<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    /** @use HasFactory<\Database\Factories\IngresosFactory> */
    use HasFactory;
    protected $table = "ingresos";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'status_autorizacion',
        'detalle',
        'propiedad_id',
        'sub_propiedad_id',
        'guardia_id',
        'vehiculo_id',
        'ingresante_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    public function propiedad()
    {
        return $this->belongsTo(Propiedades::class, 'propiedad_id');
    }
    public function subPropiedad()
    {
        return $this->belongsTo(SubPropiedades::class, 'sub_propiedad_id');
    }
    public function guardia()
    {
        return $this->belongsTo(Guardias::class, 'guardia_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }
    public function ingresante()
    {
        return $this->belongsTo(Ingresantes::class, 'ingresante_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function detalleIngreso()
    {
        return $this->hasMany(DetalleIngresos::class, 'ingreso_id');
    }
}
