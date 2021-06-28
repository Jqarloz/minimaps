<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Image;
use App\Models\Location;
use App\Models\Menus\Service;
use App\Models\Network;
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
        $services = Service::factory(50)->create();

        foreach ($services as $service) {
            Image::factory(1)->serviceUrl()->create([
                'imageable_id' => $service->id,
                'imageable_type' => Service::class
            ]);

            /* Datos de contacto */
            Contact::factory(3)->create([
                'contactable_id' => $service->id,
                'contactable_type' => Service::class
            ]);

            /* Datos de localizacion */
            Location::factory(1)->create([
                'locationable_id' => $service->id,
                'locationable_type' => Service::class
            ]);

            /* Datos de redes sociales */
            Network::factory(1)->create([
                'networkable_id' => $service->id,
                'networkable_type' => Service::class,
                'type' => 'facebook'
            ]);
            Network::factory(1)->create([
                'networkable_id' => $service->id,
                'networkable_type' => Service::class,
                'type' => 'instagram'
            ]);
            Network::factory(1)->create([
                'networkable_id' => $service->id,
                'networkable_type' => Service::class,
                'type' => 'twitter'
            ]);

            Network::factory(1)->create([
                'networkable_id' => $service->id,
                'networkable_type' => Service::class,
                'type' => 'tiktok'
            ]);

            Network::factory(1)->create([
                'networkable_id' => $service->id,
                'networkable_type' => Service::class,
                'type' => 'linkedin'
            ]);

            Network::factory(1)->create([
                'networkable_id' => $service->id,
                'networkable_type' => Service::class,
                'type' => 'youtube'
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
