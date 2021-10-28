<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table_6_Model as MainModel;

class Table_6_Seeder extends Seeder
{
    // Maybe error with unique Factory
    private $quantity = 18;

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
