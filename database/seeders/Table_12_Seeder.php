<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table_12_Model as MainModel;

class Table_12_Seeder extends Seeder
{
    // Maybe error with unique Factory
    private $quantity;

    public function __construct()
    {
      $this->quantity = config('settings.seeder_quantity.table_12');
    }

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
