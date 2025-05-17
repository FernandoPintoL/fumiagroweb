<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = [
            'detalleIngresos',
            'galeriaIngresos',
            'galeriaVehiculos',
            'guardias',
            'ingresantes',
            'ingresos',
            'modelHasPermissions',
            'modelHasRoles',
            'permissions',
            'propiedades',
            'propiedadesGuardias',
            'propietarios',
            'roles',
            'rolesHasPermissions',
            'statusIngresos',
            'subPropiedades',
            'tipoDocumentos',
            'tipoEspacios',
            'tipoPropiedades',
            'tipoVehiculos',
            'users',
            'vehiculos',
            'vehiculosIngresantes'
        ];
        $permissions = [
            '.create',
            '.read',
            '.update',
            '.delete'
        ];
        foreach ($modulos as $modulo) {
            foreach ($permissions as $permission) {
                Permission::create([
                    'name' => $modulo . $permission
                ]);
            }
        }
    }
}
