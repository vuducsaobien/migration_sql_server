-- ROLLBACK Simple
BEGIN TRANSACTION
SELECT * FROM TemplateTable_3

DELETE FROM TemplateTable_3
SELECT * FROM TemplateTable_3

ROLLBACK;
SELECT * FROM TemplateTable_3

-- COMMIT Simple
BEGIN TRANSACTION
SELECT * FROM TemplateTable_3

DELETE FROM TemplateTable_3
SELECT * FROM TemplateTable_3

COMMIT

BEGIN TRANSACTION
ROLLBACK;
SELECT * FROM TemplateTable_3


-- 1. Normal
SELECT * FROM TemplateTable_3

BEGIN TRANSACTION;
BEGIN TRY

	-- OK
	UPDATE TemplateTable_3
	SET marks = 999
	WHERE student = 'student_1'

	-- Wrong
	UPDATE TemplateTable_3
	SET marks = 888
	WHERE student = 3

	COMMIT TRANSACTION;
END TRY

BEGIN CATCH
	IF @@TRANCOUNT > 0 
	ROLLBACK TRANSACTION;
END CATCH

SELECT * FROM TemplateTable_3

-- Save Transaction
BEGIN TRANSACTION

	DELETE FROM TemplateTable_2 
	WHERE id = 1

-- Sp1
SAVE TRANSACTION Sp1;

	DELETE FROM TemplateTable_2 
	WHERE id = 2

-- Sp2
SAVE TRANSACTION Sp2;

	DELETE FROM TemplateTable_2 
	WHERE id = 3

-- Sp3
SAVE TRANSACTION Sp3;

	DELETE FROM TemplateTable_2 
	WHERE id = 4

--ROLLBACK TRANSACTION Sp1;
ROLLBACK TRANSACTION Sp2;
--ROLLBACK TRANSACTION Sp3;

	DELETE FROM TemplateTable_2 
	WHERE id = 5

COMMIT

-- 2. ROLLBACK
-- 1. Normal
SELECT * FROM TemplateTable_3

BEGIN TRANSACTION;
BEGIN TRY

	-- OK
	UPDATE TemplateTable_3
	SET marks = 999
	WHERE student = 'student_1'

	-- Wrong
	UPDATE TemplateTable_3
	SET marks = 888
	WHERE student = 1 -- NOTICE

	COMMIT TRANSACTION;
END TRY

BEGIN CATCH
	IF @@TRANCOUNT > 0 
	ROLLBACK TRANSACTION;
END CATCH

SELECT * FROM TemplateTable_3

-- transactions nicely
	DECLARE @startingTranCount INT

	SET @startingTranCount	= @@TRANCOUNT

	SELECT * FROM TemplateTable_3

	PRINT '1. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)


	IF @startingTranCount > 0
		BEGIN
			PRINT '2. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
			SAVE TRANSACTION mySavePointName
		END
	ELSE
		BEGIN
			PRINT '3. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
			BEGIN TRANSACTION
			PRINT '4. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
		END

	-- …

		PRINT '5. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
		-- OK
		UPDATE TemplateTable_3 SET marks = 999 WHERE student = 'student_1'

		-- 01.Wrong
		--UPDATE TemplateTable_3 SET marks = 888 WHERE student = 3
		
		-- 02.OK
		UPDATE TemplateTable_3 SET marks = 888 WHERE student = 'student_2'


	-- 2
		PRINT '6. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)

	IF @startingTranCount = 0
		BEGIN
			PRINT '7. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
			PRINT @@TRANCOUNT
			COMMIT TRANSACTION
			PRINT '8. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
		END

	-- 3
	-- Roll back changes...

	PRINT '9. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
	IF @startingTranCount > 0
		BEGIN

			IF @@TRANCOUNT - @startingTranCount = 1
			BEGIN
				PRINT '10. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
					ROLLBACK TRANSACTION MySavePointName
				PRINT '11. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
			END

		END
	ELSE
		BEGIN

			IF @@TRANCOUNT - @startingTranCount = 1
			BEGIN
				PRINT '12. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
					ROLLBACK TRANSACTION
				PRINT '13. @@TRANCOUNT = ' + CAST(@@TRANCOUNT AS VARCHAR) + ' - @startingTranCount = ' + CAST(@startingTranCount AS VARCHAR)
			END

		END

	SELECT * FROM TemplateTable_3

-- END transactions nicely

-- 2 Transaction runnning
-- Mở 2 tab sql server chạy
-- Tab 1 chạy trước
BEGIN TRANSACTION
	UPDATE TemplateTable_3 SET marks = 666666 WHERE student = 'student_3' AND subject = 'subject_1'
	WAITFOR DELAY '00:00:30'
	COMMIT
-- Tab 2 chạy sau
BEGIN TRANSACTION
	UPDATE TemplateTable_3 SET marks = 55555 WHERE student = 'student_3' AND subject = 'subject_2'
	WAITFOR DELAY '00:00:30'
	COMMIT

-- UPDATE
-- Waitfor Delay Transaction with sp_lock
-- https://stackoverflow.com/questions/34674039/sql-transaction-doesnt-release-lock-after-commit
SELECT * FROM TemplateTable_2
SELECT * FROM TemplateTable_3

BEGIN TRAN

	DELETE FROM TemplateTable_2 WHERE id = 3
	
	WAITFOR DELAY '00:00:30' --Cancel the command

COMMIT TRAN

sp_lock

BEGIN TRAN
Update TemplateTable_3 set marks = 9999 WHERE student = 'student_1'
Commit Tran -- Completed transaction.