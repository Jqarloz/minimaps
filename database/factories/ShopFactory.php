<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(250),
            'status' => $this->faker->randomElement([1,2]),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::where('type','shops')->get()->random()->id,
            'home_service' => $this->faker->randomElement(['Y','N']),
            'hs_isfree' => $this->faker->randomElement(['Y', 'N']),
            'hs_mincost' => $this->faker->randomFloat(2,10,100),
            'hs_maxcost' => $this->faker->randomElement([null, $this->faker->randomFloat(2,101,350)]),
            'website' => $this->faker->url(),
            'hour_always' => $this->faker->randomElement(['Y', 'N']),
            'hour_open' => $this->faker->time('H:i'),
            'hour_close' => $this->faker->time('H:i')
        ];
    }
}
