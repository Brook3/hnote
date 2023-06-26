# find_in_set
> 用于无限极联

1. 数据库字段设计
```sql
id int,
parent_id varchar(50)
逗号分隔：1,3,5,6,8,11
```
2. 运用
```sql
# 找出子集
$id = 1;
select * from tablename where find_in_set($id,parent_id) or id=$id;
```