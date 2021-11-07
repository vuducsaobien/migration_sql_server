<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class StoreProcedure extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE PROCEDURE procedure_1 AS BEGIN SELECT * FROM TemplateTable_3; END");

        DB::unprepared("CREATE PROCEDURE procedure_2 
        @student nvarchar(MAX)
        AS BEGIN 
            SELECT * FROM TemplateTable_3
            WHERE student = @student
        ; END");

        DB::unprepared("CREATE PROCEDURE procedure_3 
        @student nvarchar(MAX),
        @subject nvarchar(MAX)
        AS BEGIN 
            SELECT * FROM TemplateTable_3
            WHERE student = @student
            AND   subject = @subject
        ; END");

        DB::unprepared("CREATE PROCEDURE procedure_4 
        @student nvarchar(MAX),
        @subject nvarchar(MAX)
        AS BEGIN 
            UPDATE TemplateTable_3
			SET   marks   = 500
			WHERE student = @student
			AND   subject = @subject
        ; END");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure IF EXISTS procedure_1");    
        DB::unprepared("DROP procedure IF EXISTS procedure_2");    
        DB::unprepared("DROP procedure IF EXISTS procedure_3");    
        DB::unprepared("DROP procedure IF EXISTS procedure_4");    
        DB::unprepared("DROP procedure IF EXISTS procedure_5");    
    }
}
