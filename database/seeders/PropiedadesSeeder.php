<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('propiedades')->insert([
            [
                'name' => 'OFICINAS FUMI AGRO',
                'detalle' => 'Oficianas Fumi Agro',
                'tipo_propiedad_id' => 1,
                'propietario_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'SILOS FUMI AGRO',
                'detalle' => 'Silos Fumi Agro',
                'tipo_propiedad_id' => 2,
                'propietario_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
