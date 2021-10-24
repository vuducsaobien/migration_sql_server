<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Table1 extends Migration
{
    private $table_db = 'table_1';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->id();

            $table->string('string_1');
            $table->string('string_2', 5);
            $table->string('string_3', 11);
            $table->string('string_4', 10);
            $table->string('string_5');
            $table->string('string_6');
            $table->string('string_7')->unique();
            $table->string('string_8');
            $table->string('string_9');
            $table->string('string_10');
            $table->string('string_11');

            $table->integer('number_3');
            $table->integer('number_4');
            $table->integer('number_5');
            $table->integer('number_6');
            $table->integer('number_7');
            $table->integer('number_8');
            $table->float('number_9');
            $table->float('number_10');
            $table->float('number_11');

            $table->dateTime('date_time_1');
            $table->dateTime('date_time_2', 6);
            $table->string('date_time_3');
            $table->string('date_time_4');
            $table->string('date_time_5');
            $table->string('date_time_6');
            $table->string('date_time_7');
            $table->string('date_time_8');
            $table->string('date_time_9');
            $table->dateTime('date_time_10');
            $table->dateTime('date_time_11');
            $table->dateTime('date_time_12');
            $table->dateTime('date_time_13');
            $table->dateTime('date_time_14');
            $table->dateTime('date_time_15');
            $table->string('date_time_16');
            $table->string('date_time_17');
            $table->string('date_time_18');
            $table->string('date_time_19');
            $table->string('date_time_20');
            $table->string('date_time_21');
            $table->string('date_time_22');

            $table->boolean('ext_1');
            $table->string('ext_2');
            $table->string('ext_3');
            $table->string('ext_4');

            // $table->timestamps();
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
