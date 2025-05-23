<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at'
    ];
}
