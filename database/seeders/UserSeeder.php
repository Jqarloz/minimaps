<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Juan Carlos Hernandez',
                'email' => 'juancarlos_hs@hotmail.com',
                'password' => bcrypt('donni123')
            ]
        );

        User::factory(99)->create();
    }
}