-- SELECT is_broker_enabled FROM sys.databases WHERE name = 'migration_db';
-- ALTER DATABASE migration_db SET ENABLE_BROKER
-- GO

-- -- ALTER DATABASE [Database_name] SET DISABLE_BROKER;
-- -- GO

-- SELECT is_broker_enabled FROM sys.databases WHERE name = 'migration_db';

-- 02
-- https://blabosoft.com/implementing-queue-in-sql-server
CREATE TABLE SimpleQueue
(
    Id UNIQUEIDENTIFIER NOT NULL PRIMARY KEY,
    CreatedAt DATETIME2 NOT NULL,
    ProcessingStartedAt DATETIME2,
    Errors NVARCHAR(MAX),
    Payload NVARCHAR(MAX)
);

CREATE INDEX IX_SIMPLEQUEUE_POP on SimpleQueue (ProcessingStartedAt, CreatedAt ASC)
INCLUDE (Id)
WHERE ProcessingStartedAt IS NULL;

--
INSERT INTO SimpleQueue (Id, CreatedAt, Payload)
VALUES (
    'd6513312-4dcc-4c44-b044-08b98257037c' -- newly generated GUID
    ,'2021-09-16 17:55:38.403' -- the current timestamp in UTC
    ,'I am an awesome payload in MS SQL Server'
);

-- https://www.sqlservercentral.com/articles/working-with-queues-in-sql-server

-- 01. Tái hiện vấn đề gặp phải
-- Mở 2 tab query, chạy cái này trước rồi chạy cái kia
-- Query 01 (Có TRANSACTION) giống Query 02 (Có TRANSACTION)

DECLARE @work_queue_id int, @name varchar(255)
BEGIN TRANSACTION

 -- select 1 queue item to process that hasn't been processed yet
 SELECT TOP(1)
 @work_queue_id = work_queue_id, @name = name
 FROM
 table_19
 WHERE processed_flag = 0
 PRINT 'Processing ' + @name + ', work_queue_id = ' + CONVERT(varchar, @work_queue_id)
 -- simulate delay
 WAITFOR DELAY '00:00:15'
 -- flag item as processed
 UPDATE table_19 SET processed_flag = 1 WHERE work_queue_id = @work_queue_id
COMMIT

/* Nhận thấy:
- Cả 2 đều Lấy work_queue_id = 1 để Update. (Records = 1)
- Cả 2 query đều thành công
- Query 1 xong trước xong mới đến Query 2
*/

-------------------------------------------------------------------------------------------------------------------------------------
/* 02. Giải quyết vấn đề (Không tính đến hiệu suất)
Action:
-- Mở 2 tab query, chạy Query 1 rồi tới Query 2
-- Query 01 (Có TRANSACTION) KHÁC Query 02 (Không có TRANSACTION)
*/

-- Query 01
DECLARE @work_queue_id int, @name varchar(255)
BEGIN TRANSACTION
 -- select 1 queue item to process that hasn't been processed yet
 SELECT TOP(1)
 @work_queue_id = work_queue_id, @name = name
 FROM

 table_19 WITH (UPDLOCK)

 WHERE processed_flag = 0
 PRINT 'Processing ' + @name + ', work_queue_id = ' + CONVERT(varchar, @work_queue_id)
 -- simulate delay
 WAITFOR DELAY '00:00:15'
 -- flag item as processed
 UPDATE table_19 SET processed_flag = 1 WHERE work_queue_id = @work_queue_id
COMMIT

-- Query 02
UPDATE TOP(1)
 
table_19

SET
 processed_flag = 1
OUTPUT
 inserted.work_queue_id, inserted.processed_flag
WHERE
 processed_flag = 0

 /* Nhận thấy:
 - Đã giải quyết được vấn đề nhưng chưa tính đến hiệu năng
 - Cả 2 query đều thành công

- (Records = 2)
+ Query 1 Lấy work_queue_id = 2 để Update (Vì Query 1 chạy trước)
+ Query 2 Lấy work_queue_id = 3 để Update (Vì Query 2 chạy sau)

- Query 2 phải đợi Query 1, Cả 2 cùng xong 1 lúc 
*/

-------------------------------------------------------------------------------------------------------------------------------------
/* 03. Giải quyết vấn đề (Tính đến hiệu suất)
Action:
-- Mở 2 tab query, chạy Query 1 rồi tới Query 2
-- Query 01 (Có TRANSACTION) KHÁC Query 02 (Không có TRANSACTION)
-- Thêm khóa READPAST (Cả 2 query)
*/

-- Query 01
DECLARE @work_queue_id int, @name varchar(255)
BEGIN TRANSACTION
 -- select 1 queue item to process that hasn't been processed yet
 SELECT TOP(1)
 @work_queue_id = work_queue_id, @name = name
 FROM

-- Giải quyết
table_19 WITH (UPDLOCK, READPAST)

 WHERE processed_flag = 0
 PRINT 'Processing ' + @name + ', work_queue_id = ' + CONVERT(varchar, @work_queue_id)
 -- simulate delay
 WAITFOR DELAY '00:00:15'
 -- flag item as processed
 UPDATE table_19 SET processed_flag = 1 WHERE work_queue_id = @work_queue_id
COMMIT

-- Query 02
UPDATE TOP(1)
 
 -- Giải quyết
 table_19 WITH (READPAST)

SET
 processed_flag = 1
OUTPUT
 inserted.work_queue_id, inserted.processed_flag
WHERE
 processed_flag = 0

  /* Nhận thấy:
 - Đã giải quyết được vấn đề, tính đến cả hiệu năng
 - Cả 2 query đều thành công
 - Query 2 xong trước Query 1, không cần phải đợi

- (Records = 2)
+ Query 1 Lấy work_queue_id = 2 để Update (Vì Query 1 chạy trước)
+ Query 2 Lấy work_queue_id = 3 để Update (Vì Query 2 chạy sau)
*/

---------------------------------------------------------------------------
/*
Tổng kết: 
- Chia 3 cấp độ LV
- 2 Cách tái hiện

C1:
Chạy 2 câu query (1 và 2 trên 2 query và 3 LV, 1 2 giống nhau)

SELECT GETDATE();

DECLARE @work_queue_id int, @name varchar(255)
BEGIN TRANSACTION
 -- select 1 queue item to process that hasn't been processed yet
 SELECT TOP(1)
 @work_queue_id = work_queue_id, @name = name
 FROM

-- LV1
 --table_19

 -- LV2 
 --table_19 WITH (UPDLOCK)

 -- LV3
 table_19 WITH (UPDLOCK, READPAST)

 WHERE processed_flag = 0
 PRINT 'Processing ' + @name + ', work_queue_id = ' + CONVERT(varchar, @work_queue_id)
 -- simulate delay
 WAITFOR DELAY '00:00:15'
 -- flag item as processed
 UPDATE table_19 SET processed_flag = 1 WHERE work_queue_id = @work_queue_id
COMMIT

SELECT GETDATE();

C2:
Chạy 2 câu query (1 và 2 trên 2 query và 3 LV, 1 2 KHÁC nhau)
Query 1: Câu query trên
Query 2: 
UPDATE TOP(1)
 
 -- Giải quyết
-- LV1
 --table_19

 -- LV2 
 --table_19 WITH (UPDLOCK)

 -- LV3
 table_19 WITH (UPDLOCK, READPAST)

SET
 processed_flag = 1
OUTPUT
 inserted.work_queue_id, inserted.processed_flag
WHERE
 processed_flag = 0

*/