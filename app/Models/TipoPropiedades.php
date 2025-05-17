<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPropiedades extends Model
{
    /** @use HasFactory<\Database\Factories\TipoPropiedadesFactory> */
    use HasFactory;
    protected $table = "tipo_propiedades";
    protected $primaryKey = "id";
    protected $fillable = [
        'sigla',
        'detalle',
        'created_at',
        'updated_at'
    ];
}
