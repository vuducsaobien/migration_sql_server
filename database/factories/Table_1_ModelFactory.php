<?php

namespace Database\Factories;

use App\Models\Table_1_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_1_ModelFactory extends Factory
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

            'parent_id_1'  => $faker->numberBetween(1, 10),
            'parent_id_2'  => $faker->numberBetween(1, 10),

            'number'  => $faker->numberBetween(1, 9) * 1000,

        ];
    }
}
