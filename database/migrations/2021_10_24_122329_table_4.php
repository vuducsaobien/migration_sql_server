<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Table4 extends Migration
{
    private $table_db = 'table_4';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('age');
            $table->string('address');
            $table->integer('salary');
            
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
