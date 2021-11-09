<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_19_Model as MainModel;

class Table19 extends Migration
{
    private $table_db = 'table_19';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->id('work_queue_id');
            $table->string('name', 255);
            $table->boolean('processed_flag');
        });

        MainModel::insert([
            
            [
                'name'           => 'A',
                'processed_flag' => 0
            ],[
                'name'           => 'B',
                'processed_flag' => 0
            ],[
                'name'           => 'C',
                'processed_flag' => 0
            ],[
                'name'           => 'D',
                'processed_flag' => 0
            ],[
                'name'           => 'E',
                'processed_flag' => 0
            ],[
                'name'           => 'F',
                'processed_flag' => 0
            ],[
                'name'           => 'G',
                'processed_flag' => 0
            ],[
                'name'           => 'H',
                'processed_flag' => 0
            ]

        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_db);
    }
}
