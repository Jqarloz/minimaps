<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['movil', 'phone', 'email']);

        if ($type == 'email') {
            $name = $this->faker->email();
        } else {
            $name = $this->faker->e164PhoneNumber();
        }
        
        return [
            'name' => $name,
            'type' => $type
        ];
    }
}
