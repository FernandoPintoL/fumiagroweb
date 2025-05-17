<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEspacios extends Model
{
    /** @use HasFactory<\Database\Factories\TipoEspaciosFactory> */
    use HasFactory;
    protected $table = "tipo_espacios";
    protected $primaryKey = "id";
    protected $fillable = [
        'sigla',
        'detalle',
        'created_at',
        'updated_at'
    ];
}
