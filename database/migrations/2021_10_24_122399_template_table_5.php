<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TemplateTable_5_Model as MainModel;

class TemplateTable5 extends Migration
{
    private $table_db = 'TemplateTable_5';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('student');
            $table->string('subject');
            $table->integer('marks');
        });

        MainModel::insert([
            
            [
                'student' => 'student_1', 'parent_id' => 1, 'subject' => 'subject_1', 'marks'   => 90,
            ],[
                'student' => 'student_1', 'parent_id' => 2, 'subject' => 'subject_2', 'marks'   => 95,
            ],[
                'student' => 'student_1', 'parent_id' => 3, 'subject' => 'subject_3', 'marks'   => 80,
                
            ],[
                'student' => 'student_2', 'parent_id' => 1, 'subject' => 'subject_1', 'marks'   => 70,
            ],[
                'student' => 'student_2', 'parent_id' => 2, 'subject' => 'subject_2', 'marks'   => 60,
            ],[
                'student' => 'student_2', 'parent_id' => 3, 'subject' => 'subject_3', 'marks'   => 90,

            ],[
                'student' => 'student_3', 'parent_id' => 1, 'subject' => 'subject_1', 'marks'   => 80,
            ],[
                'student' => 'student_3', 'parent_id' => 2, 'subject' => 'subject_2', 'marks'   => 100,
            ],[
                'student' => 'student_3', 'parent_id' => 3, 'subject' => 'subject_2', 'marks'   => 100,
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
