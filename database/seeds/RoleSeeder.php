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

        $roleA->givePermissionTo(['gestionar_departamentos',
            'gestionar_productos', 'gestionar_accesos',
            'gestionar_clientes', 'gestionar_carrito']);

    }
}
