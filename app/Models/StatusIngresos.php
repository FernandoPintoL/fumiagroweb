<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusIngresos extends Model
{
    /** @use HasFactory<\Database\Factories\StatusIngresosFactory> */
    use HasFactory;
    protected $table = "status_ingreso";
    protected $primaryKey = "id";
    protected $fillable = [
        'sigla',
        'detalle',
        'color',
        'icono',
        'created_at',
        'updated_at'
    ];
    public function detalleIngreso(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DetalleIngresos::class, 'status_ingreso_id', 'id');
    }
}
