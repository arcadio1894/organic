<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permisos de administrador
        $permission1 = Permission::create(['name' => 'gestionar_departamentos']);
        $permission2 = Permission::create(['name' => 'gestionar_productos']);
        $permission3 = Permission::create(['name' => 'gestionar_accesos']);
        $permission4 = Permission::create(['name' => 'gestionar_clientes']);
        $permission5 = Permission::create(['name' => 'gestionar_carrito']);
    }
}
