<?php

namespace Database\Factories;

use App\Models\Table_12_Model as MainModel;
use App\Models\Table_14_Model;
use App\Models\Table_13_Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_12_ModelFactory extends Factory
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
        $faker        = $this->faker;
        $ids_table_13 = Table_13_Model::pluck('id_table_13')->toArray();
        $ids_table_14 = Table_14_Model::pluck('id_table_14')->toArray();

        return [
            'id_table_13'   => $faker->randomElement($ids_table_13),
            'id_table_14'   => $faker->randomElement($ids_table_14),
            'name_table_12' => $faker->name(),

        ];
    }
}
