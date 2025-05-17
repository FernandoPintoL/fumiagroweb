<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date_create('now')->format('Y-m-d H:i:s');
        \DB::table('guardias')->insert([
            [
                'name' => 'Guardia 1',
                'nroDocumento' => '12345678',
                'celular' => '123456789',
                'tipo_documento_id' => 1,
                'user_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
