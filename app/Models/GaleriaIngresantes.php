<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaIngresantes extends Model
{
    /** @use HasFactory<\Database\Factories\GaleriaIngresantesFactory> */
    use HasFactory;
    protected $table = "galeria_ingresantes";
    protected $primaryKey = "id";
    protected $fillable = [
        'ingresante_id',
        'photo_path',
        'detalle',
        'created_at',
        'updated_at'
    ];
    public function ingresante(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ingresantes::class, 'ingreso_id', 'id');
    }
}
