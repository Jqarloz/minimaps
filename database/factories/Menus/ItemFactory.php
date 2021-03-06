<?php

namespace Database\Factories\Menus;

use App\Models\Category;
use App\Models\Menus\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

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
            'category_id' => Category::where('type','items')->get()->random()->id
        ];
    }
}
