<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'name' => 'Autos',
                'slug' => 'autos',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Alimentos y Bebidas',
                'slug' => 'alimentos-y-bebidas',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Mascotas',
                'slug' => 'mascotas',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Papelería y Mercería',
                'slug' => 'papeleria-y-merceria',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Bebes',
                'slug' => 'bebes',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Belleza y Cuidado Personal',
                'slug' => 'belleza-y-cuidado-personal',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Tecnología',
                'slug' => 'tecnologia',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Misceláneas',
                'slug' => 'miscelaneas',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'VideoJuegos',
                'slug' => 'videojuegos',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Gimnasios y Deportes',
                'slug' => 'gimnasios-y-deportes',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Herramientas',
                'slug' => 'herramientas',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Hogar, Muebles y Jardín',
                'slug' => 'hogar-muebles-y-jardin',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Industria y Oficina',
                'slug' => 'industria-y-oficina',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Joyas y Relojes',
                'slug' => 'joyas-y-relojes',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Regalos y Juguetes',
                'slug' => 'regalos-y-juguetes',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Musica',
                'slug' => 'musica',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Recuerdos',
                'slug' => 'recuerdos',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Salud y Medicina',
                'slug' => 'salud-y-medicina',
                'type' => 'shops'
            ]
        );
        Category::create(
            [
                'name' => 'Erotismo',
                'slug' => 'erotismo',
                'type' => 'shops'
            ]
        );

    }
}
