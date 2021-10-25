<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TemplateTable_2_Model as MainModel;

class TemplateTable_2_Seeder extends Seeder
{
    // Maybe error with unique Factory
    private $quantity = 20;

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
