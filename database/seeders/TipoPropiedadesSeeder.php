<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('tipo_propiedades')->insert([
            [
                'sigla' => 'OFICINAS',
                'detalle' => 'OFICINAS',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'FINCA',
                'detalle' => 'FINCA',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'OTRO',
                'detalle' => 'OTRO',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
