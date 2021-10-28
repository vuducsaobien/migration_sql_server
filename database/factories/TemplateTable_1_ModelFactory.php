<?php

namespace Database\Factories;

use App\Models\TemplateTable_1_Model AS MainModel;
use App\Models\TemplateTable_2_Model AS SecondModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateTable_1_ModelFactory extends Factory
{
    private static $idOne = 1;

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
        $ids      = SecondModel::pluck('id')->toArray();

        static $idTwo = 1;

        return [
            // 01.String
            'string_1'  => $faker->name,
            'string_2'  => $faker->regexify('[A-Za-z0-9]{5}'),
            'string_3'  => $faker->regexify('[A-Za-z0-9]{5} Hello'),
            'string_4'  => $faker->randomElement(["foo $string_1", "bar $string_1", 'baz']),
            'string_5'  => $faker->bothify($string = '## ??'),
            'string_6'  => strtoupper( $faker->bothify( $string = '## ??' ) ),
            'string_7'  => $faker->unique()->safeEmail,
            'string_8'  => $faker->email,
            'string_9'  => $faker->phoneNumber,
            'string_10' => $faker->numerify('###-###-####'),
            'string_11' => $faker->numerify('##########'),
            'string_12' => 'string_12_text',
            'string_13' => 'string_' . self::$idOne++ . '_text',
            
            // 02. Number
            'number_3'  => $faker->numberBetween(2, 5),
            'number_4'  => $faker->unique()->numberBetween(2, 15),
            'number_5'  => $faker->numberBetween(-2, 3),
            'number_6'  => $faker->randomDigit(),
            'number_7'  => $faker->randomDigitNotNull(),
            'number_8'  => $faker->randomNumber(),
            'number_9'  => $faker->randomFloat(),
            'number_10' => $faker->randomFloat(4, 0, 10),
            'number_11' => $faker->randomFloat(1, 0, 13) * 1000,
            'number_12' => $idTwo++,
            'number_13' => 13,
            'number_14' => $faker->randomElement($ids),

            // 03. Date Time
            'date_time_1'  => $faker->dateTime(),
            'date_time_2'  => $faker->dateTime(),
            'date_time_3'  => $faker->iso8601(),
            'date_time_4'  => $faker->date(),
            'date_time_5'  => $faker->date('Y_m_d'),
            'date_time_6'  => $faker->date('Ymd'),
            'date_time_7'  => $faker->time(),
            'date_time_8'  => $faker->time('H_i_s'),
            'date_time_9'  => $faker->time('His'),
            'date_time_10' => $faker->dateTimeBetween(),
            'date_time_11' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'date_time_12' => $faker->dateTimeBetween('-1 days', '+1 days'),
            'date_time_13' => $faker->dateTimeThisDecade(),
            'date_time_14' => $faker->dateTimeThisYear(),
            'date_time_15' => $faker->dateTimeThisMonth(),
            'date_time_16' => $faker->amPm(),
            'date_time_17' => $faker->amPm('+ 2 weeks'),
            'date_time_18' => $faker->dayOfMonth(),
            'date_time_19' => $faker->dayOfWeek(),
            'date_time_20' => $faker->month(),
            'date_time_21' => $faker->monthName(),
            'date_time_22' => $faker->year(),

            // 04. Exten
            'ext_1' => $faker->boolean,

            'ext_2' => implode( $faker->randomElements([
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'
            ], 5) ),

            'ext_3' => implode( $faker->randomElements([
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'
            ], 6, true) ),

            'ext_4' => $faker->imageUrl($width = 200, $height = 200),

        ];
    }
}
