<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roleA = Role::create(['name' => 'admin']);
        $roleU = Role::create(['name' => 'user']);
        $roleC = Role::create(['name' => 'creator']);

        $roleA->givePermissionTo([
            'ingresar_dashboard',
            'listar_departamento',
            'crear_departamento',
            'ver_departamento',
            'modificar_departamento',
            'eliminar_departamento',
            'restaurar_departamento',
            'gestionar_productos',
            'gestionar_accesos',
            'gestionar_clientes',
            'gestionar_carrito'
        ]);

        $roleC->givePermissionTo([
            'ingresar_dashboard',
            'listar_departamento',
            'crear_departamento',
            'ver_departamento'
        ]);

    }
}
