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