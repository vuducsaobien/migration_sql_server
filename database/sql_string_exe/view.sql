CREATE VIEW view_01 AS
SELECT * FROM TemplateTable_5 WHERE id > 0
WITH CHECK OPTION;

-- Action
SELECT * FROM view_01
SELECT * FROM view_01 WHERE  id > 3

-- UPDAte View
IF EXISTS(SELECT 1 from sys.views WHERE name='view_01' and type='v')
	UPDATE view_01 SET subject = 'subject_view', marks = 900
	WHERE id > 4;
GO

SELECT * FROM TemplateTable_5

-- => UPDATE View cũng Update luôn DB

-- UPDATE DB => View cũng thay đổi
UPDATE TemplateTable_5 SET marks = 9999
SELECT * FROM TemplateTable_5
SELECT * FROM view_01
