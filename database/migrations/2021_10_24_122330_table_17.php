<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_17_Model as MainModel;

class Table17 extends Migration
{
    private $table_db = 'table_17';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->id();
            $table->integer('MaHang');
            $table->integer('SoLuongDat');
            $table->boolean('IsErrorTrigger')->nullable(false)->default(TRUE);
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
