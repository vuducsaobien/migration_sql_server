<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TemplateTable_1_Model as MainModel;

class TemplateTable_1_Seeder extends Seeder
{
    // Maybe error with unique Factory
    private $quantity = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainModel::factory()->count($this->quantity)->create();
    }
}
