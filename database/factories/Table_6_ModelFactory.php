<?php

namespace Database\Factories;

use App\Models\Table_6_Model as MainModel;
use App\Models\Table_7_Model;

use Illuminate\Database\Eloquent\Factories\Factory;

class Table_6_ModelFactory extends Factory
{
    private static $id_table = 3;

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
        $faker  = $this->faker;
        $ids    = Table_7_Model::pluck('id_table_7')->toArray();

        return [

            'id_table_7'   => $faker->randomElement($ids),
            'name_table_6' => 'name_table_6_' . self::$id_table++,

        ];
    }
}
