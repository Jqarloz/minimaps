<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Menus\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::factory(200)->create();

        foreach ($services as $service) {
            Image::factory(1)->serviceUrl()->create([
                'imageable_id' => $service->id,
                'imageable_type' => Service::class
            ]);

            $service->tags()->attach(
                rand(1,6),
                [
                    'taggable_id' => $service->id,
                    'taggable_type' => Service::class
                ]
            );
            $service->tags()->attach(
                rand(6,12),
                [
                    'taggable_id' => $service->id,
                    'taggable_type' => Service::class
                ]
            );
        }
    }
}
