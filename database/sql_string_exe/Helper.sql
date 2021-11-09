-- Drop all Store Procedure
-- SELECT 'DROP PROCEDURE [' + SCHEMA_NAME(p.schema_id) + '].[' + p.NAME + '];'
-- FROM sys.procedures p 
--https://stackoverflow.com/questions/2610820/how-to-drop-all-stored-procedures-at-once-in-sql-server-database

-- Drop All Tables
DECLARE @Sql NVARCHAR(500) DECLARE @Cursor CURSOR

SET @Cursor = CURSOR FAST_FORWARD FOR
SELECT DISTINCT sql = 'ALTER TABLE [' + tc2.TABLE_SCHEMA + '].[' +  tc2.TABLE_NAME + '] DROP [' + rc1.CONSTRAINT_NAME + '];'
FROM INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS rc1
LEFT JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS tc2 ON tc2.CONSTRAINT_NAME =rc1.CONSTRAINT_NAME

OPEN @Cursor FETCH NEXT FROM @Cursor INTO @Sql

WHILE (@@FETCH_STATUS = 0)
BEGIN
Exec sp_executesql @Sql
FETCH NEXT FROM @Cursor INTO @Sql
END

CLOSE @Cursor DEALLOCATE @Cursor
GO

EXEC sp_MSforeachtable 'DROP TABLE ?'
GO

DROP PROCEDURE [dbo].[procedure_1];
DROP PROCEDURE [dbo].[procedure_2];
DROP PROCEDURE [dbo].[procedure_3];
DROP PROCEDURE [dbo].[procedure_4];
DROP VIEW [dbo].[view_01];
DROP FUNCTION [dbo].[getJstDatetime];
DROP FUNCTION [dbo].[get_function_scalar_01];
DROP FUNCTION [dbo].[get_function_scalar_02];
DROP FUNCTION [dbo].[get_function_scalar_03];
DROP FUNCTION [dbo].[get_function_scalar_04];
DROP FUNCTION [dbo].[get_function_tabler_01];
DROP FUNCTION [dbo].[get_function_tabler_02];
DROP FUNCTION [dbo].[get_function_tabler_03];
DROP TRIGGER trigger_Insert;
DROP TRIGGER trigger_Update;
DROP TRIGGER trigger_Delete;
