<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Menus\Service;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'shops/' . $this->faker->image('public/storage/shops', 640,480, null, false)
        ];        
        
    }

    public function serviceUrl()
    {
        return $this->state([
            'url' => 'services/' . $this->faker->image('public/storage/services', 640,480, null, false)
        ]); 
    }
}
