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
                'status' => 1
            ]
        );
        Menu::create(
            [
                'name' => 'Servicios',
                'status' => 1
            ]
        );
        Menu::create(
            [
                'name' => 'Tienda',
                'status' => 0
            ]
        );
        Menu::create(
            [
                'name' => 'Empleos',
                'status' => 0
            ]
        );
    }
}
