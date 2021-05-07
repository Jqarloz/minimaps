<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'latitude' => $this->faker->latitude(19.15470221450499, 19.17403725227091),
            'longitude' => $this->faker->longitude(-98.30834574346633,-98.31009722083819),
            'reference' => $this->faker->sentence(),
            'physical_location' => $this->faker->randomElement(['Y','N'])
        ];
    }
}
