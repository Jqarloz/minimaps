<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('shops');
        Storage::makeDirectory('shops');
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(12)->create();
        //Menu::factory(4)->create();
        $this->call(ShopSeeder::class);
    }
}
