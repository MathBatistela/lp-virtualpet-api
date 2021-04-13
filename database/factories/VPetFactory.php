<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\VPet;
use Illuminate\Database\Eloquent\Factories\Factory;

class VPetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VPet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->firstName,
            'skin' => $this->faker->randomElement(array('HERBIVORE','CARNIVORE','OMNIVORE')),
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}
