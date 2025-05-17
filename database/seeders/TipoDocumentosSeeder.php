<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('tipo_documentos')->insert([
            [
                'sigla' => 'CI',
                'detalle' => 'CARNET DE IDENTIDAD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'LIC',
                'detalle' => 'LICENCIA DE CONDUCIR',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'TIC',
                'detalle' => 'TARJETA DE IDENTIFICACION DEL CONDUCTOR',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'PAS',
                'detalle' => 'Pasaporte',
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
