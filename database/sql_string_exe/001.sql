SELECT * FROM table_1
WHERE id IN (1, 2)

-- Group By 01
SElECT parent_id_1, SUM( number ) AS total FROM table_1
GROUP BY parent_id_1

SElECT parent_id_1, COUNT( number ) AS COUNT FROM table_1
GROUP BY parent_id_1

SElECT parent_id_1, MIN( number ) AS MIN FROM table_1
GROUP BY parent_id_1

SElECT parent_id_1, MAX( number ) AS MAX FROM table_1
GROUP BY parent_id_1

-- Group By 02
SElECT parent_id_1, SUM( number ) AS total FROM table_1
GROUP BY parent_id_1

SElECT parent_id_2, SUM( number ) AS total FROM table_1
GROUP BY parent_id_2

SElECT parent_id_1, parent_id_2, SUM( number ) AS total FROM table_1
GROUP BY parent_id_1, parent_id_2
ORDER BY parent_id_1, parent_id_2

-- DISTINCT
SELECT DISTINCT first_name
FROM table_3

SELECT DISTINCT last_name
FROM table_3

-- Update
SELECT DISTINCT first_name, last_name
FROM table_3

-- Check
SELECT * FROM table_3
WHERE first_name = 'first_name_1'

SELECT * FROM table_3
WHERE first_name = 'first_name_3'

-- UNION
SELECT * FROM table_4
WHERE id IN (1, 2, 3)

UNION

SELECT * FROM table_4
WHERE id IN (2, 3, 4)

-- UNION
SELECT * FROM table_4
WHERE id IN (1, 2, 3)

UNION ALL

SELECT * FROM table_4
WHERE id IN (2, 3, 4)


-- UNION
SELECT  
	        table_4.id, customer_id, name, amount, date
FROM        table_4
LEFT JOIN   table_5
   ON       table_4.id = table_5.customer_id

UNION

SELECT      table_4.id, customer_id, name, amount, date
FROM        table_4
RIGHT JOIN  table_5
    ON      table_4.id = table_5.customer_id

-- PIVOT
SELECT * FROM table_5

SELECT 
	'Value' AS Total_Amount_Per_Customer_Id, 
	[1], 
	[2],
	[3],
	[4]
FROM
(
	SELECT customer_id, amount
	FROM table_5
) AS Source_query
PIVOT
(
	SUM(amount)
	FOR customer_id IN ([1], [2], [3], [4])
) AS Pivot_table;

-- PIVOT 02
SELECT * FROM TemplateTable_3 

--
SELECT * FROM 

( SELECT * FROM TemplateTable_3 ) AS StudentResults

PIVOT 

(
    SUM(marks)
    FOR subject
    IN 
    (
        subject_1,
        subject_2,
        subject_3
    )
) AS PivotTable

--
SELECT student, subject_1 FROM 

( SELECT * FROM TemplateTable_3 ) AS StudentResults

PIVOT 

(
    SUM(marks)
    FOR subject
    IN 
    (
        subject_1,
        subject_2,
        subject_3
    )
) AS PivotTable

--
SELECT * FROM 

( SELECT * FROM TemplateTable_3 ) AS StudentResults

PIVOT 

(
    SUM(marks)
    FOR subject
    IN 
    (
        subject_1,
        subject_2,
        subject_3
    )
) AS PivotTable

WHERE student = 'student_1'

-- MERGE 01
SELECT * FROM table_10
SELECT * FROM table_11

MERGE table_10
USING 
(
	SELECT 
		Employee_id, 
		First_name, 
		Salary, 
		Department_id 
    FROM table_11 
    WHERE Department_id IN(1, 2, 3, 4, 5)
) a

ON a.Employee_id = table_10.Employee_id
--ON a.Salary = table_10.Salary

WHEN MATCHED THEN
    UPDATE SET 
		First_name = a.First_name, 
		Salary     = a.Salary

WHEN NOT MATCHED THEN
    INSERT VALUES ( 
	a.Employee_id, 
	a.First_name, 
	a.Salary, 
	a.Department_id);

