<?php

namespace Database\Factories;

use App\Models\Table_4_Model;
use App\Models\Table_5_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_5_ModelFactory extends Factory
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
        // $ids      = Table_4_Model::pluck('id')->toArray();

        return [

            'date' => $faker->randomElement([
                "2009-10-08 00:00:00", 
                "2009-11-20 00:00:00", 
                "2008-05-20 00:00:00",
            ]),

            // 'customer_id' => $faker->randomElement($ids),

            'customer_id' => $faker->randomElement([1,2,3,4]),

            'amount'      => $faker->randomFloat(1, 1, 9) * 1000,

        ];
    }
}
