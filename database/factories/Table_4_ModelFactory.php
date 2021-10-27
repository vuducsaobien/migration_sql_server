<?php

namespace Database\Factories;

use App\Models\Table_4_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_4_ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MainModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker    = $this->faker;

        return [

            'name' => $faker->unique()->name,

            'age'  => $faker->numberBetween(20, 40),

            'address' => $faker->randomElement([
                "Da Nang", 
                "Ha Noi", 
                "Vinh",
            ]),

            'salary' => $faker->randomFloat(1, 1, 9) * 1000,

        ];
    }
}
