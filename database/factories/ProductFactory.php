<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(4, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => $this->faker->randomFloat(2,10,2500),
            'description' => $this->faker->text(200),
            'image' => $this->faker->url()
        ];
    }
}
