-- https://viblo.asia/p/su-dung-trigger-trong-sql-qua-vi-du-co-ban-aWj538APK6m
-- https://softwareengineering.stackexchange.com/questions/123074/sql-triggers-and-when-or-when-not-to-use-them

-- CREATE TABLE tbl_KhoHang ( id int NOT NULL, MaHang varchar(20) NOT NULL, TenHang text NOT NULL, SoLuongTon int NOT NULL ) ;
-- INSERT INTO tbl_KhoHang (id, MaHang, TenHang, SoLuongTon) VALUES (1, '1', 'Rau mong toi', 12), (2, '2', 'Rau muong', 5), (3, '3', 'Lam bo gi ni', 8);
-- ALTER TABLE tbl_KhoHang ADD PRIMARY KEY (MaHang);

-- CREATE TABLE tbl_DatHang ( id int NOT NULL, MaHang text NOT NULL, SoLuongDat int NOT NULL );
-- INSERT INTO tbl_DatHang (id, MaHang, SoLuongDat) VALUES (11, '1', 10);
-- ALTER TABLE tbl_DatHang ADD PRIMARY KEY (id);

-- tbl_DatHang = table_17
-- tbl_KhoHang = table_18

-- 01. Insert BASIC
CREATE TRIGGER trigger_Insert ON table_17 AFTER INSERT AS 
BEGIN

    -- Update JOIN
    UPDATE table_18
    SET SoLuongTon = SoLuongTon - ( SELECT SoLuongDat FROM inserted WHERE inserted.MaHang = table_18.MaHang )
    
    FROM table_18 
    JOIN inserted ON table_18.MaHang = inserted.MaHang

END
GO


-- 02. Insert UPDATE
CREATE TRIGGER trigger_Insert ON table_17 AFTER INSERT AS 
BEGIN
	DECLARE @SoLuongDat INT
	SET @SoLuongDat = ( SELECT SoLuongDat FROM inserted INNER JOIN table_18 ON inserted.MaHang = table_18.MaHang  )

	IF 	@SoLuongDat > 0 
		AND 
		@SoLuongDat <= ( SELECT table_18.SoLuongTon FROM table_18 JOIN inserted ON inserted.MaHang = table_18.MaHang )

	BEGIN

		PRINT 'IF'

		UPDATE table_18
		SET SoLuongTon = SoLuongTon - @SoLuongDat
		
        FROM table_18
		JOIN inserted ON table_18.MaHang = inserted.MaHang

	END
	ELSE
	BEGIN

		PRINT 'ELSE'

		--DECLARE @id INT, @MaHang INT, @SoLuongDat INT, @IsErrorTrigger BIT
		--SET @id = (SELECT id FROM inserted )
		--SET @MaHang = (SELECT MaHang FROM inserted )
		--SET @SoLuongDat = (SELECT SoLuongDat FROM inserted )
		--SET @IsErrorTrigger = (SELECT IsErrorTrigger FROM inserted )

		--PRINT 'INFO inserted: id = ' + CAST(@id as nvarchar) + ' - MaHang = ' + CAST(@MaHang as nvarchar) + ' - SoLuongDat = ' + CAST(@SoLuongDat as nvarchar) + ' - IsErrorTrigger = ' + CAST(@IsErrorTrigger as nvarchar)
		--PRINT CAST(@id as nvarchar) + ' - ' + CAST(@MaHang as nvarchar) + ' - ' + CAST(@SoLuongDat as nvarchar) + ' - ' + CAST(@IsErrorTrigger as nvarchar) + ' - '
		
		UPDATE table_17
		SET IsErrorTrigger = 1
		
        FROM table_17
		JOIN inserted ON table_17.id = inserted.id


	END
END
GO

-- 02. Delete Basic
CREATE TRIGGER trigger_Delete ON table_17 FOR DELETE AS 
BEGIN

	UPDATE table_18
	SET SoLuongTon = SoLuongTon + (SELECT SoLuongDat FROM deleted WHERE deleted.MaHang = table_18.MaHang)
	FROM table_18 
	JOIN deleted ON table_18.MaHang = deleted.MaHang

END
GO

-- 03. Update
CREATE TRIGGER trigger_Update ON table_17 AFTER UPDATE AS
BEGIN

   UPDATE table_18 SET 
        SoLuongTon = SoLuongTon -
	   ( SELECT SoLuongDat FROM inserted WHERE MaHang = table_18.MaHang ) 
       +
	   ( SELECT SoLuongDat FROM deleted  WHERE MaHang = table_18.MaHang )
   FROM table_18 
   JOIN deleted ON table_18.MaHang = deleted.MaHang

END
GO

-- CHECK
DROP TRIGGER trigger_DatHang;

SELECT * FROM table_17
SELECT * FROM table_18

-- Insert
INSERT table_17 VALUES(1, 2, 0)
SELECT * FROM table_17
SELECT * FROM table_18

INSERT table_17 VALUES(1, 5, 0)
SELECT * FROM table_17
SELECT * FROM table_18

INSERT table_17 VALUES(1, 10, 0)
SELECT * FROM table_17
SELECT * FROM table_18