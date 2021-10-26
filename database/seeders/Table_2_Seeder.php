<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table_2_Model as MainModel;

class Table_2_Seeder extends Seeder
{
    // Maybe error with unique Factory
    private $quantity = 8;

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
