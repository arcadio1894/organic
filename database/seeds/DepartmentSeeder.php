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
            'name' => 'Frutas',
            'description' => 'Departamento de Frutas Frescas',
            'image' => '1.jpg'
        ]);

        Department::create([
            'name' => 'Vegetales',
            'description' => 'Departamento de Vegetales',
            'image' => '2.jpg'
        ]);

        Department::create([
            'name' => 'Bebidas',
            'description' => 'Departamento de Bebidas de Frutas',
            'image' => '3.jpg'
        ]);

        Department::create([
            'name' => 'Carnes Frescas',
            'description' => 'Departamento de Carnes Frescas',
            'image' => '4.jpg'
        ]);

        Department::create([
            'name' => 'Aves',
            'description' => 'Departamento de Regalos con frutas y nueces',
            'image' => '5.jpg'
        ]);

        Department::create([
            'name' => 'Pescados',
            'description' => 'Departamento de Moras frescas',
            'image' => '6.jpg'
        ]);

        Department::create([
            'name' => 'Congelados',
            'description' => 'Departamento de Moras frescas',
            'image' => '7.jpg'
        ]);

        Department::create([
            'name' => 'Quesos/Fiambres',
            'description' => 'Departamento de Moras frescas',
            'image' => '8.jpg'
        ]);

        Department::create([
            'name' => 'Abarrotes',
            'description' => 'Departamento de Moras frescas',
            'image' => '9.jpg'
        ]);

        Department::create([
            'name' => 'Cervezas/Licores',
            'description' => 'Departamento de Moras frescas',
            'image' => '10.jpg'
        ]);

        Department::create([
            'name' => 'Panadería/Pastelería',
            'description' => 'Departamento de Moras frescas',
            'image' => '11.jpg'
        ]);

        Department::create([
            'name' => 'Cuidado del Bebé',
            'description' => 'Departamento de Moras frescas',
            'image' => '12.jpg'
        ]);

        Department::create([
            'name' => 'Cuidado Personal',
            'description' => 'Departamento de Moras frescas',
            'image' => '13.jpg'
        ]);

        Department::create([
            'name' => 'Juguetería',
            'description' => 'Departamento de Moras frescas',
            'image' => '14.jpg'
        ]);

        Department::create([
            'name' => 'Limpieza',
            'description' => 'Departamento de Moras frescas',
            'image' => '15.jpg'
        ]);

        Department::create([
            'name' => 'Mascotas',
            'description' => 'Departamento de Moras frescas',
            'image' => '16.jpg'
        ]);

        Department::create([
            'name' => 'Librería',
            'description' => 'Departamento de Moras frescas',
            'image' => '17.jpg'
        ]);

    }
}
