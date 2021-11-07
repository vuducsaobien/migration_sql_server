<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Table12 extends Migration
{
    private $table_db = 'table_12';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->bigInteger('id_table_13')->unsigned();
            $table->bigInteger('id_table_14')->unsigned();

            $table->foreign('id_table_13')->references('id_table_13')->on('table_13');    
            $table->foreign('id_table_14')->references('id_table_14')->on('table_14');   

            $table->primary(['id_table_13', 'id_table_14']);

            $table->string('name_table_12');

        });

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
