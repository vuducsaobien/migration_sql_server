<?php

namespace Database\Factories;

use App\Models\Table_7_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_7_ModelFactory extends Factory
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
        // $ids      = Table_4_Model::pluck('id')->toArray();

        return [

            'name_table_7' => 'name_table_7_' . self::$id_table++,

        ];
    }
}
