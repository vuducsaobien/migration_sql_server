<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Trigger extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement
        ("CREATE TRIGGER trigger_Insert ON table_17 AFTER INSERT AS 
        BEGIN
            DECLARE @SoLuongDat INT
            SET @SoLuongDat = ( SELECT SoLuongDat FROM inserted INNER JOIN table_18 ON inserted.MaHang = table_18.MaHang  )
        
            IF 	@SoLuongDat > 0 
                AND 
                @SoLuongDat <= ( SELECT table_18.SoLuongTon FROM table_18 JOIN inserted ON inserted.MaHang = table_18.MaHang )
        
            BEGIN
        
                UPDATE table_18
                SET SoLuongTon = SoLuongTon - @SoLuongDat
                FROM table_18
                JOIN inserted ON table_18.MaHang = inserted.MaHang
        
            END
            ELSE
            BEGIN
                
                UPDATE table_17
                SET IsErrorTrigger = 1
                FROM table_17
                JOIN inserted ON table_17.id = inserted.id

            END
        END
        ;");

        DB::statement
        ("CREATE TRIGGER trigger_Delete ON table_17 FOR DELETE AS 
            BEGIN
            
                UPDATE table_18
                SET SoLuongTon = SoLuongTon + (SELECT SoLuongDat FROM deleted WHERE deleted.MaHang = table_18.MaHang)
                FROM table_18 
                JOIN deleted ON table_18.MaHang = deleted.MaHang
            
            END
        ;");

        DB::statement
        ("CREATE TRIGGER trigger_Update ON table_17 AFTER UPDATE AS
            BEGIN
            
                UPDATE table_18 SET 
                        SoLuongTon = SoLuongTon -
                    ( SELECT SoLuongDat FROM inserted WHERE MaHang = table_18.MaHang ) 
                    +
                    ( SELECT SoLuongDat FROM deleted  WHERE MaHang = table_18.MaHang )
                FROM table_18 
                JOIN deleted ON table_18.MaHang = deleted.MaHang
            
            END
        ;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_01");
    }
}
