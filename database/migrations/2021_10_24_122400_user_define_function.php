<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UserDefineFunction extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE FUNCTION [dbo].get_function_scalar_01()
            RETURNS INT AS
            BEGIN
                RETURN 5
            END
        ;");

        DB::statement("CREATE FUNCTION [dbo].get_function_scalar_02()
            RETURNS VARCHAR(MAX) AS
            BEGIN
                RETURN 'Alo - Alo'
            END
        ;");

        DB::statement("CREATE FUNCTION [dbo].get_function_scalar_03()
            RETURNS NVARCHAR(MAX) AS
            BEGIN
                RETURN 'Alo - Alo - ' + CAST(5 as nvarchar)
            END
        ;");

        DB::statement("CREATE FUNCTION [dbo].getJstDatetime()
            RETURNS datetime2
            BEGIN
                RETURN DATEADD(HOUR, 9, SYSUTCDATETIME())
            END
        ;");

        DB::statement("CREATE FUNCTION [dbo].[get_function_scalar_04](@id INT)
            RETURNS NVARCHAR(MAX)
            BEGIN
                RETURN (SELECT string_1 FROM dbo.TemplateTable_1 WHERE id = @id)
            END
        ;");

        DB::statement("CREATE FUNCTION [dbo].get_function_tabler_01()
            RETURNS TABLE AS RETURN 
            SELECT string_1 FROM TemplateTable_1
            --SELECT string_1 FROM TemplateTable_1 WHERE id = 1        
        ;");

        DB::statement("CREATE FUNCTION [dbo].get_function_tabler_02(@id INT)
            RETURNS TABLE AS RETURN 
                SELECT string_1 FROM TemplateTable_1 WHERE id = @id
        ;");

        DB::statement("CREATE FUNCTION get_function_tabler_03()
                RETURNS @contacts TABLE (
                    first_name VARCHAR(50),
                    last_name VARCHAR(50),
                    email VARCHAR(255),
                    contact_type VARCHAR(20)
                )
            AS
            BEGIN
                INSERT INTO @contacts
                SELECT 
                    first_name, 
                    last_name, 
                    email, 
                    'Staff'
                FROM
                    table_15;
            
                INSERT INTO @contacts
                SELECT 
                    first_name, 
                    last_name, 
                    email, 
                    'Customer'
                FROM
                    table_16;
                RETURN;
            END;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP FUNCTION get_function_scalar_01");
        DB::statement("DROP FUNCTION get_function_scalar_01");
        DB::statement("DROP FUNCTION get_function_scalar_01");
        DB::statement("DROP FUNCTION get_function_scalar_01");
        DB::statement("DROP FUNCTION getJstDatetime");

        DB::statement("DROP FUNCTION get_function_tabler_01");
        DB::statement("DROP FUNCTION get_function_tabler_02");
        DB::statement("DROP FUNCTION get_function_tabler_03");
    }
}
