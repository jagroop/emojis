# Handle Emojies in PHP Mysql

This is a demo application to represent how we can handle emojies using php and mysql.

- Database: Change Database default collation as utf8mb4.

- Table: Change table collation as CHARACTER SET utf8mb4 COLLATE utf8mb4_bin.

Query:

```mysql
ALTER TABLE Tablename CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin
```

- Code:

```mysql
INSERT INTO tablename (column1, column2, column3, column4, column5, column6, column7)
VALUES ('273', '3', 'Hdhdhdh😜😀😊😃hzhzhzzhjzj 我爱你 ❌', 49, 1, '2016-09-13 08:02:29', '2016-09-13 08:02:29')
```

- Set utf8mb4 in database connection:

```php
$config = [
  'host'    => 'localhost',
  'driver'  => 'mysql',
  'database'  => 'test',
  'username'  => 'root',
  'password'  => '',
  'charset' => 'utf8',
  'collation' => 'utf8mb4',
  'prefix'   => ''
];
```
