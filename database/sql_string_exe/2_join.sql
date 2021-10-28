-- LEFT JOIN, INNER JOIN, RIGHT JOIN
-- 1
SELECT * FROm table_6
ORDER BY id_table_7
    
-- 2
SELECT * FROM table_6
LEFT JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
ORDER BY 
	id_table_6

-- 3
SELECT * FROM table_6
INNER JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
ORDER BY 
	id_table_6

-- 4
SELECT * FROM table_6
RIGHT JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
ORDER BY 
	id_table_6

-- ANTI LEFT JOIN, ANTI RIGHT JOIN
SELECT * FROM table_6
LEFT JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
WHERE table_7.id_table_7 IS NULL
ORDER BY 
	id_table_6

SELECT * FROM table_6
RIGHT JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
WHERE table_6.id_table_7 IS NULL
ORDER BY 
	id_table_6

-- FULL OUTER JOIN, ANTI OUTER JOIN
SELECT * FROM table_6
FULL OUTER JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
ORDER BY 
	id_table_6

SELECT * FROM table_6
FULL OUTER JOIN table_7
ON table_6.id_table_7 = table_7.id_table_7
WHERE table_6.id_table_7 IS NULL 
OR table_7.id_table_7 IS NULL 
ORDER BY 
	id_table_6

-- CROSS JOIN
SELECT * FROM table_8 CROSS JOIN table_9
-- OR
SELECT * FROM table_8, table_9
