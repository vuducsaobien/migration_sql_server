<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table_5_Model as MainModel;

class Table_5_Seeder extends Seeder
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
