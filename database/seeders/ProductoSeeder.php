<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Obtener todas las categorías
        $categorias = Categoria::all();

        // Recorrer cada categoría y crear productos
        foreach ($categorias as $categoria) {
            for ($i = 0; $i < 10; $i++) { // Insertar 5 productos por categoría
                Producto::create([
                    'categoria_id' => $categoria->id,
                    'nombre' => $faker->word,
                    'descripcion' => $faker->sentence(10),
                    'precio' => $faker->randomFloat(2, 10, 500), // Precio entre 10 y 500
                    'stock' => $faker->numberBetween(1, 100),
                    'imagen' => $faker->imageUrl(200, 200, 'products'), // URL de imagen aleatoria
                    'estado' => $faker->boolean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
