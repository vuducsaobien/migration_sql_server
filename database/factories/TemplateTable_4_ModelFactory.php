<?php

namespace Database\Factories;

use App\Models\TemplateTable_4_Model as MainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateTable_4_ModelFactory extends Factory
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
            'string_1'  => $faker->name,
            'string_2'  => $faker->regexify('[A-Za-z0-9]{5}'),
        ];
    }
}
