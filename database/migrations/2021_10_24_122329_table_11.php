<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Table_11_Model as MainModel;

class Table11 extends Migration
{
    private $table_db = 'table_11';

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
                'EMPLOYEE_ID' => 1, 'FIRST_NAME' => 'STEVEN', 'SALARY' => 10, 'DEPARTMENT_ID' => 1
            ],[
                'EMPLOYEE_ID' => 2, 'FIRST_NAME' => 'neena2', 'SALARY' => 20, 'DEPARTMENT_ID' => 2
            ],[
                'EMPLOYEE_ID' => 3, 'FIRST_NAME' => 'Lex', 'SALARY' => 30, 'DEPARTMENT_ID' => 3
            ],[
                'EMPLOYEE_ID' => 4, 'FIRST_NAME' => 'Hermann', 'SALARY' => 40, 'DEPARTMENT_ID' => 4
            ],[
                'EMPLOYEE_ID' => 5, 'FIRST_NAME' => 'ALO', 'SALARY' => 50, 'DEPARTMENT_ID' => 5
            ],[
                'EMPLOYEE_ID' => 6, 'FIRST_NAME' => 'ALO', 'SALARY' => 60, 'DEPARTMENT_ID' => 6
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
