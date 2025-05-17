<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusIngresosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('status_ingresos')->insert([
            [
                'sigla' => 'PENDIENTE',
                'detalle' => 'PENDIENTE',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'ACEPTADO',
                'detalle' => 'ACEPTADO',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'sigla' => 'RECHAZADO',
                'detalle' => 'RECHAZADO',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
