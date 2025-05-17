<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEspaciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('tipo_espacios')->insert([
            [
                'sigla' => 'OFF',
                'detalle' => 'Oficina',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'CIL',
                'detalle' => 'Cilos',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'LAB',
                'detalle' => 'LABORATORIOS',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'OTROS',
                'detalle' => 'OTROS',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
