<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Image;
use App\Models\Location;
use App\Models\Network;
use App\Models\Product;
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
        $shops = Shop::factory(100)->create();

        foreach ($shops as $shop) {
            /* Image::factory(1)->create([
                'imageable_id' => $shop->id,
                'imageable_type' => Shop::class
            ]); */
            Image::factory(1)->create([
                'imageable_id' => $shop->id,
                'imageable_type' => Shop::class
            ]);

            Location::factory(1)->create([
                'locationable_id' => $shop->id,
                'locationable_type' => Shop::class
            ]);

            Product::factory(3)->create([
                'shop_id' => $shop->id
            ]);

            Contact::factory(3)->create([
                'contactable_id' => $shop->id,
                'contactable_type' => Shop::class
            ]);

            Network::factory(1)->create([
                'networkable_id' => $shop->id,
                'networkable_type' => Shop::class,
                'type' => 'facebook'
            ]);
            Network::factory(1)->create([
                'networkable_id' => $shop->id,
                'networkable_type' => Shop::class,
                'type' => 'instagram'
            ]);
            Network::factory(1)->create([
                'networkable_id' => $shop->id,
                'networkable_type' => Shop::class,
                'type' => 'twitter'
            ]);

            Network::factory(1)->create([
                'networkable_id' => $shop->id,
                'networkable_type' => Shop::class,
                'type' => 'tiktok'
            ]);

            Network::factory(1)->create([
                'networkable_id' => $shop->id,
                'networkable_type' => Shop::class,
                'type' => 'linkedin'
            ]);

            Network::factory(1)->create([
                'networkable_id' => $shop->id,
                'networkable_type' => Shop::class,
                'type' => 'youtube'
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
