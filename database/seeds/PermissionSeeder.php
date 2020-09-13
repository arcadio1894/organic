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
        // $permission1 = Permission::create(['name' => 'gestionar_departamentos']);
        // TODO: Voy a desmembrar el permiso gestionar departamentos
        $permission0 = Permission::create(['name' => 'ingresar_dashboard']);
        $permission11 = Permission::create(['name' => 'listar_departamento']); //get('index')
        $permission12 = Permission::create(['name' => 'crear_departamento']); //get('create')  post('store')
        $permission14 = Permission::create(['name' => 'ver_departamento']); //get('show')

        $permission13 = Permission::create(['name' => 'modificar_departamento']);//get('edit') get('update')

        $permission15 = Permission::create(['name' => 'eliminar_departamento']); //post('destroy')
        $permission16 = Permission::create(['name' => 'restaurar_departamento']); //post('restore')

        $permission2 = Permission::create(['name' => 'gestionar_productos']);
        $permission3 = Permission::create(['name' => 'gestionar_accesos']);
        $permission4 = Permission::create(['name' => 'gestionar_clientes']);
        $permission5 = Permission::create(['name' => 'gestionar_carrito']);
    }
}
