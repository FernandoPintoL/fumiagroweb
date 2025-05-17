<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngresos extends Model
{
    /** @use HasFactory<\Database\Factories\DetalleIngresosFactory> */
    use HasFactory;
    protected $table = "detalle_ingresos";
    protected $primaryKey = "id";
    protected $fillable = [
        'ingreso_id',
        'status_ingreso_id',
        'detalle',
        'created_at',
        'updated_at'
    ];
    public function ingreso(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ingresos::class, 'ingreso_id', 'id');
    }
    public function statusIngreso(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StatusIngresos::class, 'status_ingreso_id', 'id');
    }
}
