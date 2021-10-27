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