<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(
            [
                'name' => 'Negocios',
                'route' => 'shops.index',
                'status' => 1
            ]
        );
        Menu::create(
            [
                'name' => 'Servicios',
                'route' => 'services.index',
                'status' => 1
            ]
        );
        Menu::create(
            [
                'name' => 'Tienda',
                'route' => 'items.index',
                'status' => 1
            ]
        );
        Menu::create(
            [
                'name' => 'Empleos',
                'route' => 'jobs.index',
                'status' => 1
            ]
        );
    }
}
