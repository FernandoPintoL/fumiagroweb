<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubPropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('sub_propiedades')->insert([
            [
                'name' => 'OFICIANA DE FUMI AGRO',
                'detalle' => 'OFICINAS FUMI AGRO',
                'propiedad_id' => 1,
                'tipo_espacios_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'OFICINA SILOS',
                'detalle' => 'OFICINAS SILOS',
                'propiedad_id' => 2,
                'tipo_espacios_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'SILOS',
                'detalle' => 'COMPRA Y VENTA DE SEMILLAS',
                'propiedad_id' => 2,
                'tipo_espacios_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
