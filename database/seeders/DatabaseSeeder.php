<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TemplateTable_4_Seeder::class);
        $this->call(TemplateTable_2_Seeder::class);
        $this->call(TemplateTable_1_Seeder::class);

        $this->call(Table_1_Seeder::class);
        $this->call(Table_2_Seeder::class);
        $this->call(Table_3_Seeder::class);
        $this->call(Table_4_Seeder::class);
        $this->call(Table_5_Seeder::class);
        // $this->call(Table_6_Seeder::class);
    }
}
