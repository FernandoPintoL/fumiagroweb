<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentos extends Model
{
    /** @use HasFactory<\Database\Factories\TipoDocumentosFactory> */
    use HasFactory;
    protected $table = "tipo_documentos";
    protected $primaryKey = "id";
    protected $fillable = [
        'sigla',
        'detalle',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
    public function guardia()
    {
        return $this->hasMany(Guardias::class, 'tipo_documento_id');
    }
    public function ingresante()
    {
        return $this->hasMany(Ingresantes::class, 'tipo_documento_id');
    }
}
