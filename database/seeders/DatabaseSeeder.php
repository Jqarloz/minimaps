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

        Storage::deleteDirectory('jobs');
        Storage::makeDirectory('jobs');

        Storage::deleteDirectory('media/shops/products');
        Storage::deleteDirectory('media/services/products');
        Storage::deleteDirectory('media/jobs/products');
        Storage::deleteDirectory('media/items/products');
        Storage::deleteDirectory('media');
        Storage::makeDirectory('media/shops/products');
        Storage::makeDirectory('media/services/products');
        Storage::makeDirectory('media/jobs/products');
        Storage::makeDirectory('media/items/products');


        $this->call(RolSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(20)->create();
        Tag::factory(12)->create();
        //Menu::factory(4)->create();
        $this->call(MenuSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(JobSeeder::class);
        
    }
}
