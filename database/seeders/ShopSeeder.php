<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

use App\Models\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = Shop::factory(200)->create();

        foreach ($shops as $shop) {
            /* Image::factory(1)->create([
                'imageable_id' => $shop->id,
                'imageable_type' => Shop::class
            ]); */
            Image::factory(1)->create([
                'imageable_id' => $shop->id,
                'imageable_type' => Shop::class
            ]);

            $shop->tags()->attach(
                rand(1,6),
                [
                    'taggable_id' => $shop->id,
                    'taggable_type' => Shop::class
                ]
            );
            $shop->tags()->attach(
                rand(6,12),
                [
                    'taggable_id' => $shop->id,
                    'taggable_type' => Shop::class
                ]
            );
        }
    }
}
