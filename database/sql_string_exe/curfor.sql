PRINT @@TRANCOUNT
SELECT * FROM TemplateTable_5

-------
DECLARE @id INT
DECLARE @parent_id INT
DECLARE @student NVARCHAR(MAX)
DECLARE @subject NVARCHAR(MAX)
DECLARE @marks INT
DECLARE Curfor_01 CURSOR FOR

SELECT * FROM TemplateTable_5

OPEN Curfor_01
    FETCH NEXT FROM Curfor_01
    INTO @id, @parent_id, @student, @subject, @marks

	WHILE @@FETCH_STATUS = 0
    
	BEGIN
		
		-- 01
		--PRINT 'ID: ' + CAST(@id as nvarchar) + ' - ' + CAST(@parent_id as nvarchar) + ' - ' + @student + ' - ' + @subject + ' - ' + CAST(@marks as nvarchar)

		-- 02
		IF @marks >= 80
		BEGIN
			UPDATE TemplateTable_5 SET subject = 'marks >= 80' WHERE id = @id
		END
		ELSE
		BEGIN
			UPDATE TemplateTable_5 SET subject = 'marks < 80' WHERE id = @id
		END

		FETCH NEXT FROM Curfor_01
		INTO @id, @parent_id, @student, @subject, @marks
	END

CLOSE Curfor_01
DEALLOCATE Curfor_01

-- Update with TRANSACTION
DECLARE @id INT
DECLARE @parent_id INT
DECLARE @student NVARCHAR(MAX)
DECLARE @subject NVARCHAR(MAX)
DECLARE @marks INT
DECLARE Curfor_01 CURSOR FOR

SELECT * FROM TemplateTable_5

OPEN Curfor_01
BEGIN TRANSACTION;
BEGIN TRY

    FETCH NEXT FROM Curfor_01
    INTO @id, @parent_id, @student, @subject, @marks
	WHILE @@FETCH_STATUS = 0
    
	BEGIN
		
		-- 01
		--PRINT 'ID: ' + CAST(@id as nvarchar) + ' - ' + CAST(@parent_id as nvarchar) + ' - ' + @student + ' - ' + @subject + ' - ' + CAST(@marks as nvarchar)

		-- 02 Wrong
		IF @marks >= 80
		BEGIN
			UPDATE TemplateTable_5 SET marks = 'marks >= 80' WHERE id = @id
		END
		ELSE
		BEGIN
			UPDATE TemplateTable_5 SET marks = 'marks < 80' WHERE id = @id
		END

		FETCH NEXT FROM Curfor_01
		INTO @id, @parent_id, @student, @subject, @marks
	END

COMMIT TRANSACTION;
END TRY

BEGIN CATCH
    IF @@TRANCOUNT > 0
        ROLLBACK TRANSACTION;
END CATCH

CLOSE Curfor_01
DEALLOCATE Curfor_01
