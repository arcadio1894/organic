<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Naranja para Jugo',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 1.29,
            'image' => '1.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 1
        ]);

        Product::create([
            'name' => 'Plátano de Seda Paquete 5un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 2.89,
            'image' => '2.jpg',
            'stars' => 4,
            'weight' => '5 Unidades',
            'department_id' => 1
        ]);

        Product::create([
            'name' => 'Pimiento Morrón Bolsa 500g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 3.29,
            'image' => '3.jpg',
            'stars' => 4,
            'weight' => '500 gr',
            'department_id' => 2
        ]);

        Product::create([
            'name' => 'Lechuga Americana BELL\'s Bolsa 300g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 2.20,
            'image' => '4.jpg',
            'stars' => 4,
            'weight' => '300 gr',
            'department_id' => 2
        ]);

        Product::create([
            'name' => 'Agua sin Gas CIELO Alcalina Botella 650ml Paquete 6un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 8.50,
            'image' => '5.jpg',
            'stars' => 4,
            'weight' => '6 Unidades',
            'department_id' => 3
        ]);

        Product::create([
            'name' => 'Bebida de Fruta PULP Mango Caja 1L',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 3.30,
            'image' => '6.jpg',
            'stars' => 4,
            'weight' => '1 Litro',
            'department_id' => 3
        ]);

        Product::create([
            'name' => 'Costillar de Res EL BUEN CORTE x Kg',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 9.90,
            'image' => '7.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 4
        ]);

        Product::create([
            'name' => 'Bife de Lomo de Cerdo EL BUEN CORTE',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 22.52,
            'image' => '8.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 4
        ]);

        Product::create([
            'name' => 'Pollo Fresco con Menudencia',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 6.89,
            'image' => '9.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 5
        ]);

        Product::create([
            'name' => 'Gallina Importada sin Menudencia',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 6.90,
            'image' => '10.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 5
        ]);

        Product::create([
            'name' => 'Filete de Basa',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 13.90,
            'image' => '11.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 6
        ]);

        Product::create([
            'name' => 'Filete de Tilapia Importado',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 19.99,
            'image' => '12.jpg',
            'stars' => 4,
            'weight' => '1 Kg',
            'department_id' => 6
        ]);

        Product::create([
            'name' => 'Nuggets de Pechuga de Pollo REDONDOS Bolsa 13un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 4.69,
            'image' => '13.jpg',
            'stars' => 4,
            'weight' => '13 unidades',
            'department_id' => 7
        ]);

        Product::create([
            'name' => 'Hamburguesa de Garbanzos DELLANATURA Caja 6un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 23.90,
            'image' => '14.jpg',
            'stars' => 4,
            'weight' => '6 unidades',
            'department_id' => 7
        ]);

        Product::create([
            'name' => 'Queso Fresco BONLÉ Molde 400g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 11.40,
            'image' => '15.jpg',
            'stars' => 4,
            'weight' => '400 gr',
            'department_id' => 8
        ]);

        Product::create([
            'name' => 'Salchicha Frankfurter Clásica CASA EUROPA Paquete 240g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 11.90,
            'image' => '16.jpg',
            'stars' => 4,
            'weight' => '240 gr',
            'department_id' => 8
        ]);

        Product::create([
            'name' => 'Aceite Vegetal BELL\'S Galonera 5L',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 23.10,
            'image' => '17.jpg',
            'stars' => 4,
            'weight' => '5 Lt.',
            'department_id' => 9
        ]);

        Product::create([
            'name' => 'Arroz Extra COSTEÑO Bolsa 5Kg',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 17.80,
            'image' => '18.jpg',
            'stars' => 4,
            'weight' => '5 Kg.',
            'department_id' => 9
        ]);

        Product::create([
            'name' => 'Cerveza PILSEN 12Pack Lata 355ml Pack 2un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 62.90,
            'image' => '19.jpg',
            'stars' => 4,
            'weight' => 'Pack 2 Unid.',
            'department_id' => 10
        ]);

        Product::create([
            'name' => 'Whisky CHIVAS REGAL 12 Años Botella 750ml',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 62.00,
            'image' => '20.jpg',
            'stars' => 4,
            'weight' => '750 ml.',
            'department_id' => 10
        ]);

        Product::create([
            'name' => 'Pan de Molde Blanco BIMBO Extra Grande Bolsa 750g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 8.70,
            'image' => '21.jpg',
            'stars' => 4,
            'weight' => 'Bolsa de 750 g',
            'department_id' => 11
        ]);

        Product::create([
            'name' => 'Tortillas Rapiditas Clásicas BIMBO Bolsa 12un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 8.60,
            'image' => '22.jpg',
            'stars' => 4,
            'weight' => 'Bolsa de 12 Un.',
            'department_id' => 11
        ]);

        Product::create([
            'name' => 'Pañales para Bebé HUGGIES Natural Care Puro y Natural Talla XG Paquete 68un Pack 2un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 110.90,
            'image' => '23.jpg',
            'stars' => 4,
            'weight' => 'Pack 2 Un.',
            'department_id' => 12
        ]);

        Product::create([
            'name' => 'Talco para Bebé DR ZAIDMAN Frasco 600g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 18.90,
            'image' => '24.jpg',
            'stars' => 4,
            'weight' => 'Frasco 600gr',
            'department_id' => 12
        ]);

        Product::create([
            'name' => 'Pasta Dental COLGATE Triple Acción Tubo 100ml Paquete 3un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 13.90,
            'image' => '25.jpg',
            'stars' => 4,
            'weight' => 'Paquete 3 Un.',
            'department_id' => 13
        ]);

        Product::create([
            'name' => 'Alcohol Medicinal PORTUGAL de 70° Frasco 1L',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 14.20,
            'image' => '26.jpg',
            'stars' => 4,
            'weight' => 'Frasco 1L',
            'department_id' => 13
        ]);

        Product::create([
            'name' => 'Figura de Acción SPIDER-MAN Titan SM E7333',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 29.90,
            'image' => '27.jpg',
            'stars' => 4,
            'weight' => '1 Unidad',
            'department_id' => 14
        ]);

        Product::create([
            'name' => 'Bloques en Bucket Ass. HAPPY LINE 640154',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 24.90,
            'image' => '28.jpg',
            'stars' => 4,
            'weight' => '1 Unidad',
            'department_id' => 14
        ]);

        Product::create([
            'name' => 'Detergente en Polvo ACE Limón Bolsa 4Kg',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 29.90,
            'image' => '29.jpg',
            'stars' => 4,
            'weight' => 'Bolsa 4Kg',
            'department_id' => 15
        ]);

        Product::create([
            'name' => 'Lejía CLOROX Tradicional Galonera 4L',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 10.99,
            'image' => '30.jpg',
            'stars' => 4,
            'weight' => 'Galonera 4L',
            'department_id' => 15
        ]);

        Product::create([
            'name' => 'Galletas para Perros RICOCRACK Cachorros Multisabores Caja 200g',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 6.90,
            'image' => '31.jpg',
            'stars' => 4,
            'weight' => 'Caja 200g',
            'department_id' => 16
        ]);

        Product::create([
            'name' => 'Shampoo RICOCAN Antipulgas con Colágeno Frasco 380ml',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 15.00,
            'image' => '32.jpg',
            'stars' => 4,
            'weight' => 'Frasco 380ml',
            'department_id' => 16
        ]);

        Product::create([
            'name' => 'Cuaderno CLASS&WORK Cuadriculado 72Hojas',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 1.90,
            'image' => '33.jpg',
            'stars' => 4,
            'weight' => '1 Unidad',
            'department_id' => 17
        ]);

        Product::create([
            'name' => 'Papel Bond XEROX A4 75g Caja 1Resma',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 9.90,
            'image' => '34.jpg',
            'stars' => 4,
            'weight' => 'Medio millar',
            'department_id' => 17
        ]);

        Product::create([
            'name' => 'Huevos Pardos LA CALERA Paquete 30un',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 11.90,
            'image' => '35.jpg',
            'stars' => 4,
            'weight' => 'Paquete 30un',
            'department_id' => 18
        ]);

        Product::create([
            'name' => 'Leche Fresca LAIVE sin Lactosa Paquete 4un Caja 1L',
            'descriptionShort' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'descriptionLarge' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.',
            'unitsInStock' => 100,
            'unitPrice' => 16.99,
            'image' => '36.jpg',
            'stars' => 4,
            'weight' => 'Caja 1L',
            'department_id' => 18
        ]);
    }
}
