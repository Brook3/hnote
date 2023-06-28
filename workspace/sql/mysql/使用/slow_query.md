# 慢查询
### 慢查询定位（慢的原因，慢在什么地方）
* 记录慢查询日志

### 优化
* 优化查询过程中的数据访问
* 优化长难的查询语句
* 优化特定类型的查询语句

### 慢查询日志
1. 查看状态
MariaDB [(none)]> show variables like 'slow_query%';
+---------------------+------------------+
| Variable_name       | Value            |
+---------------------+------------------+
| slow_query_log      | OFF              |
| slow_query_log_file | centos7-slow.log |
+---------------------+------------------+
2 rows in set (0.00 sec)

MariaDB [(none)]> show variables like 'long_query_time';
+-----------------+-----------+
| Variable_name   | Value     |
+-----------------+-----------+
| long_query_time | 10.000000 |
+-----------------+-----------+
1 row in set (0.01 sec)

2. 配置
* 全局变量配置
mysql> set global slow_query_log='ON';
mysql> set global slow_query_log_file='/var/log/mariadb/slow.log';
mysql> set global long_query_time=1;
* 配置文件配置

