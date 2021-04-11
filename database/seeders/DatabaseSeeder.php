<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Database\Seeders\ServiceSeeder;

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

        Storage::deleteDirectory('services');
        Storage::makeDirectory('services');

        Storage::deleteDirectory('items');
        Storage::makeDirectory('items');

        $this->call(RolSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(20)->create();
        Tag::factory(12)->create();
        //Menu::factory(4)->create();
        $this->call(MenuSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ItemSeeder::class);
        
    }
}
