<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedades extends Model
{
    /** @use HasFactory<\Database\Factories\PropiedadesFactory> */
    use HasFactory;
    protected $table = "propiedades";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'detalle',
        'direccion',
        'latitud',
        'longitud',
        'propietario_id',
        'tipo_propiedad_id',
        'created_at',
        'updated_at'
    ];
    public function tipoPropiedad()
    {
        return $this->belongsTo(TipoPropiedades::class, 'tipo_propiedad_id');
    }
    public function subPropiedades()
    {
        return $this->hasMany(SubPropiedades::class, 'propiedad_id');
    }
}
