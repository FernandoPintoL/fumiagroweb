<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropiedadesGuardias extends Model
{
    /** @use HasFactory<\Database\Factories\PropiedadesGuardiasFactory> */
    use HasFactory;
    protected $table = "propiedades_guardias";
    protected $primaryKey = "id";
    protected $fillable = [
        'guardia_id',
        'propiedad_id',
        'permisos',
        'role',
        'permission',
        'created_at',
        'updated_at'
    ];
    public function guardia()
    {
        return $this->belongsTo(Guardias::class, 'guardia_id', 'id');
    }
    public function propiedad()
    {
        return $this->belongsTo(Propiedades::class, 'propiedad_id', 'id');
    }
}
