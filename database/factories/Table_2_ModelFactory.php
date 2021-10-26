<?php

namespace Database\Factories;

use App\Models\Table_2_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_2_ModelFactory extends Factory
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
        $string_1 = 'Alo';

        $array_1  = [1,2,3,4,5,6,7,8,9];
        $string_2 = 'LastName_';
        foreach ($array_1 as $value) {
            $newArr[] = $string_2 . $value;
        }
        
        return [

            'string_1'  => $faker->unique()->randomElement($newArr),

        ];
    }
}
