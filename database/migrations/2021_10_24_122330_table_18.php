<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_18_Model as MainModel;

class Table18 extends Migration
{
    private $table_db = 'table_18';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            // $table->integer('id', true);
            $table->integer('id');
            // $table->id('MaHang');

            $table->integer('MaHang');
            // $table->foreign('MaHang')->references('MaHang')->on('table_17');    
            $table->primary(['MaHang']);

            $table->string('TenHang');
            $table->integer('SoLuongTon');
        });

        MainModel::insert([
            
            [
                'id'         => 1,
                'TenHang'    => 'Rau Mùng Tơi',
                'MaHang'     => 1,
                'SoLuongTon' => 170,
            ],[
                'id'         => 2,
                'TenHang'    => 'Rau Muống',
                'MaHang'     => 2,
                'SoLuongTon' => 5,
            ],[
                'id'         => 3,
                'MaHang'     => 3,
                'TenHang'    => 'Lam bô ghi ni',
                'SoLuongTon' => 8
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
