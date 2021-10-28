<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_8_Model as MainModel;

class Table8 extends Migration
{
    private $table_db = 'table_8';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            
            $table->string('name');
            $table->integer('id_room');
            $table->integer('marks');
            
        });

        MainModel::insert([
            
            [
                'name' => 'name_1', 'id_room' => 1, 'marks'   => 2,
            ],[
                'name' => 'name_2', 'id_room' => 1, 'marks'   => 3,
            ],[
                'name' => 'name_3', 'id_room' => 2, 'marks'   => 2,
            ],[
                'name' => 'name_4', 'id_room' => 3, 'marks'   => 5,
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
