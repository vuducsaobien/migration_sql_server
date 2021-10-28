<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_6_Model as MainModel;

class Table6 extends Migration
{
    private $table_db = 'table_6';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            
            $table->id('id_table_6');
            $table->integer('id_table_7');
            $table->string('name_table_6');
            
        });

        MainModel::create([
            'id_table_7'   => 100,
            'name_table_6' => 'name_table_6_1'
        ]);

        MainModel::create([
            'id_table_7'   => 101,
            'name_table_6' => 'name_table_6_2'
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
