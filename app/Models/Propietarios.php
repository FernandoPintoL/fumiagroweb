<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietarios extends Model
{
    /** @use HasFactory<\Database\Factories\PropietariosFactory> */
    use HasFactory;
    protected $table = "propietarios";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'nroDocumento',
        'celular',
        'tipo_documento_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumentos::class, 'tipo_documento_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
