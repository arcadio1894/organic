<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Frutas Frescas',
            'description' => 'Departamento de Frutas Frescas',
            'image' => '1.jpg'
        ]);

        Department::create([
            'name' => 'Vegetales',
            'description' => 'Departamento de Vegetales',
            'image' => '2.jpg'
        ]);

        Department::create([
            'name' => 'Bebidas de Frutas',
            'description' => 'Departamento de Bebidas de Frutas',
            'image' => '3.jpg'
        ]);
    }
}
