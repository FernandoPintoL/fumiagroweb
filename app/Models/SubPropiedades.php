<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPropiedades extends Model
{
    /** @use HasFactory<\Database\Factories\SubPropiedadesFactory> */
    use HasFactory;
    protected $table = "sub_propiedades";
    protected $primaryKey = "id";
    protected $fillable = [
        'propiedad_id',
        'name',
        'detalle',
        'tipo_espacios_id',
        'created_at',
        'updated_at'
    ];
    public function propiedad()
    {
        return $this->belongsTo(Propiedades::class, 'propiedad_id');
    }
    public function tipoEspacios()
    {
        return $this->belongsTo(TipoEspacios::class, 'tipo_espacios_id');
    }

}
