<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Table5 extends Migration
{
    private $table_db = 'table_5';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id');
            $table->integer('amount');
            $table->dateTime('date');
            
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
