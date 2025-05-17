<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoVehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('tipo_vehiculos')->insert([
            [
                'sigla' => 'AUTO',
                'detalle' => 'AUTOMOVIL',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'MOTO',
                'detalle' => 'MOTOCICLETA',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'CAMION',
                'detalle' => 'CAMION',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'CAMIONETA',
                'detalle' => 'CAMIONETA',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'VOLKETA',
                'detalle' => 'VOLKETA',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'BUS',
                'detalle' => 'BUS',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
