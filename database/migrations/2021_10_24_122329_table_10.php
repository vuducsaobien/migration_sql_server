<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_10_Model as MainModel;

class Table10 extends Migration
{
    private $table_db = 'table_10';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->integer('EMPLOYEE_ID');
            $table->string('FIRST_NAME');
            $table->integer('SALARY');
            $table->integer('DEPARTMENT_ID');
        });

        MainModel::insert([
            
            [
                'EMPLOYEE_ID' => 1, 'FIRST_NAME' => 'Steven', 'SALARY' => 10, 'DEPARTMENT_ID' => 11
            ],[
                'EMPLOYEE_ID' => 2, 'FIRST_NAME' => 'Neena', 'SALARY' => 25, 'DEPARTMENT_ID' => 22
            ],[
                'EMPLOYEE_ID' => 3, 'FIRST_NAME' => 'Lex', 'SALARY' => 30, 'DEPARTMENT_ID' => 3
            ],[
                'EMPLOYEE_ID' => 4, 'FIRST_NAME' => 'Hermann', 'SALARY' => 40, 'DEPARTMENT_ID' => 4
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
