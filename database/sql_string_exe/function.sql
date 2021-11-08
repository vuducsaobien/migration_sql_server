-- A Scalar Function
-- Những chú ý khi chúng ta sử dụng Sacalar Function SQL:

-- Scalar Function có thể sử dụng trong các câu lệnh truy vấn T-SQL.
-- Cho phép một hoặc nhiều tham số (parameter) truyền vào nhưng giá trị trả về chỉ một giá trị (Single Value).
-- Có thể sử dụng cấu trúc rẻ nhánh IF, và vòng lặp WHILE trong hàm.
-- Trong Scalar không cho phép chúng ta sử dụng từ khóa UPDATE để cập nhật dữ liệu.
-- Scalar function có thể được gọi lại để sử dụng trong các function khác.

-- 01
CREATE FUNCTION [dbo].get_function_scalar_01()
RETURNS INT AS
BEGIN
    RETURN 5
END

SELECT [dbo].get_function_scalar_01()

-- 02
CREATE FUNCTION [dbo].get_function_scalar_02()
RETURNS VARCHAR(MAX) AS
BEGIN
    RETURN 'Alo - Alo'
END

SELECT [dbo].get_function_scalar_02() Alo

-- 03
CREATE FUNCTION [dbo].get_function_scalar_03()
RETURNS NVARCHAR(MAX) AS
BEGIN
    RETURN 'Alo - Alo - ' + CAST(5 as nvarchar)
END

SELECT [dbo].get_function_scalar_03()


-- 04 Change time When Update, delete time INTO Table
SELECT date_time_1 FROM TemplateTable_1

	CREATE FUNCTION [dbo].[getJstDatetime]()
	RETURNS datetime2
	BEGIN
		RETURN DATEADD(HOUR, 9, SYSUTCDATETIME())
	END

	--SELECT DATEADD(HOUR, 9, SYSUTCDATETIME());
	--SELECT CURRENT_TIMEZONE();

UPDATE TemplateTable_1 SET date_time_1 = [dbo].[getJstDatetime]()
SELECT date_time_1 FROM TemplateTable_1

-- 05 Parameter - 01
CREATE FUNCTION [dbo].[get_function_scalar_04](@id INT)
RETURNS NVARCHAR(MAX)
BEGIN
	RETURN (SELECT string_1 FROM dbo.TemplateTable_1 WHERE id = @id)
END

SELECT [dbo].get_function_scalar_04(1)

-- 05 Parameter - 02
SELECT [dbo].get_function_scalar_04(1)

SELECT * FROM dbo.TemplateTable_1
WHERE string_1 = [dbo].get_function_scalar_04(1)



--------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- B. Table Function
-- View vs Table Function 
-- https://stackoverflow.com/questions/4960137/table-valued-functiontvf-vs-view
-- https://comdy.vn/sql-server/function-trong-sql-server/
-- https://www.sqlservertutorial.net/sql-server-user-defined-functions/sql-server-table-valued-functions/
--01
CREATE FUNCTION [dbo].get_function_tabler_01()
RETURNS TABLE AS RETURN 
	SELECT string_1 FROM TemplateTable_1
	--SELECT string_1 FROM TemplateTable_1 WHERE id = 1

SELECT * FROM get_function_tabler_01()

-- 02
CREATE FUNCTION [dbo].get_function_tabler_02(@id INT)
RETURNS TABLE AS RETURN 
	SELECT string_1 FROM TemplateTable_1 WHERE id = @id

SELECT * FROM get_function_tabler_02(1)
SELECT * FROM get_function_tabler_02(2)

-- 03 Multi-statement table-valued functions (MSTVF)
CREATE FUNCTION get_function_tabler_03()
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
END;

-- Run in New query
SELECT * FROM get_function_tabler_03()

---------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- Query Check Function
SELECT [dbo].get_function_scalar_01()
SELECT [dbo].get_function_scalar_02() Alo
SELECT [dbo].get_function_scalar_03()

SELECT date_time_1 FROM TemplateTable_1
UPDATE TemplateTable_1 SET date_time_1 = [dbo].[getJstDatetime]()
SELECT date_time_1 FROM TemplateTable_1

SELECT [dbo].get_function_scalar_04(1)

SELECT [dbo].get_function_scalar_04(1)
SELECT * FROM dbo.TemplateTable_1
WHERE string_1 = [dbo].get_function_scalar_04(1)

-- Table Function
SELECT * FROM get_function_tabler_01()
SELECT * FROM get_function_tabler_02(1)
SELECT * FROM get_function_tabler_02(2)
SELECT * FROM get_function_tabler_03()