<?php

namespace Database\Factories;

use App\Models\Table_15_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Table_15_ModelFactory extends Factory
{
    private static $id_table_1 = 1;
    private static $id_table_2 = 1;
    private static $id_table_3 = 1;

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

            'first_name'   => 'first_name_table_15_' . self::$id_table_1++,
            'last_name'    => 'last_name_table_15_' . self::$id_table_2++,
            'email'        => 'email_table_15_' . self::$id_table_3++,
            // 'contact_type' => 'Staff'
        ];
    }
}
