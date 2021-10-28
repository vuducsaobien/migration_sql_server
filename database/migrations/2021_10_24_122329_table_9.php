<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_9_Model as MainModel;

class Table9 extends Migration
{
    private $table_db = 'table_9';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            
            $table->id('id_room');
            $table->string('name_room');
            
        });

        MainModel::insert([
            
            [
                'name_room' => 'name_room_1',
            ],[
                'name_room' => 'name_room_2',
            ],[
                'name_room' => 'name_room_3',
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
