<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table_3_Model as MainModel;

class Table_3_Seeder extends Seeder
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
