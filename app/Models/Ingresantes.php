<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresantes extends Model
{
    /** @use HasFactory<\Database\Factories\IngresantesFactory> */
    use HasFactory;
    protected $table = "ingresantes";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'email',
        'nroDocumento',
        'celular',
        'is_permitido',
        'descripcion_is_no_permitido',
        'tipo_documento_id',
        'created_at',
        'updated_at'
    ];
    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumentos::class, 'tipo_documento_id');
    }
}
