<?php

namespace Database\Factories;

use App\Models\Table_3_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_3_ModelFactory extends Factory
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

            'first_name' => $faker->randomElement([
                "first_name_1", 
                "first_name_2", 
                "first_name_3",
                "first_name_4",
            ]),

            'last_name' => $faker->randomElement([
                "last_name_5", 
                "last_name_6", 
                "last_name_7",
            ]),

        ];
    }
}
