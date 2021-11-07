<?php

namespace Database\Factories;

use App\Models\Table_13_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_13_ModelFactory extends Factory
{
    private static $id_table = 1;

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

            'name_table_13' => 'name_table_13_' . self::$id_table++,

        ];
    }
}
