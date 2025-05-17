<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $now = date_create('now')->format('Y-m-d H:i:s');
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'usernick' => 'superadmin',
            'password' => bcrypt('123456789'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        // para el dueño como went
        User::create([
            'name' => 'Administrador Web',
            'email' => 'web@admin.com',
            'usernick' => 'propietario',
            'password' => bcrypt('123456789'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        //para el guardia
        User::create([
            'name' => 'Guardia Web',
            'email' => 'guardia@admin.com',
            'usernick' => 'guardia',
            'password' => bcrypt('123456789'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $this->call([
            // Add other seeders here
            TipoDocumentosSeeder::class,
            TipoEspaciosSeeder::class,
            TipoPropiedadesSeeder::class,
            TipoVehiculosSeeder::class,
            PropietariosSeeder::class,
            PropiedadesSeeder::class,
            SubPropiedadesSeeder::class,
            StatusIngresosSeeder::class,
            GuardiasSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
