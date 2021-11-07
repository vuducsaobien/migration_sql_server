<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TemplateTable_3_Model as MainModel;

class TemplateTable3 extends Migration
{
    private $table_db = 'TemplateTable_3';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->string('student');
            $table->string('subject');
            $table->integer('marks');
        });

        MainModel::insert([
            
            [
                'student' => 'student_1', 'subject' => 'subject_1', 'marks'   => 90,
            ],[
                'student' => 'student_1', 'subject' => 'subject_2', 'marks'   => 95,
            ],[
                'student' => 'student_1', 'subject' => 'subject_3', 'marks'   => 80,
                
            ],[
                'student' => 'student_2', 'subject' => 'subject_1', 'marks'   => 70,
            ],[
                'student' => 'student_2', 'subject' => 'subject_2', 'marks'   => 60,
            ],[
                'student' => 'student_2', 'subject' => 'subject_3', 'marks'   => 90,

            ],[
                'student' => 'student_3', 'subject' => 'subject_1', 'marks'   => 80,
            ],[
                'student' => 'student_3', 'subject' => 'subject_2', 'marks'   => 100,
            ],[
                'student' => 'student_3', 'subject' => 'subject_2', 'marks'   => 100,
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
