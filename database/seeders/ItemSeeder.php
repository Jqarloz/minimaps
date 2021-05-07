<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Menus\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::factory(150)->create();

        foreach ($items as $item) {
            Image::factory(1)->itemUrl()->create([
                'imageable_id' => $item->id,
                'imageable_type' => Item::class
            ]);

            $item->tags()->attach(
                rand(1,6),
                [
                    'taggable_id' => $item->id,
                    'taggable_type' => Item::class
                ]
            );
            $item->tags()->attach(
                rand(6,12),
                [
                    'taggable_id' => $item->id,
                    'taggable_type' => Item::class
                ]
            );
        }
    }
}
