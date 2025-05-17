<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superAdmin = \Spatie\Permission\Models\Role::create(['name' => 'super-admin']);
        $propietario = \Spatie\Permission\Models\Role::create(['name' => 'propietario']);
        $guardia = \Spatie\Permission\Models\Role::create(['name' => 'guardia']);

        $superAdmin->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $user = \App\Models\User::find(1);
        $user->assignRole($superAdmin);

        $user = \App\Models\User::find(2);
        $user->assignRole($propietario);

        $user = \App\Models\User::find(3);
        $user->assignRole($guardia);

    }
}
