<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentModel as MainModel;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MainModel::class, 10)->create();
    }
}
