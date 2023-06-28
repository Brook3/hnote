# 1. docker

直接写成shell脚本
备份：
```shell
# 这里密码和-p之间不能有空格
docker exec -i Brook3.mysql bash -c "mysqldump -uroot -proot -l -F brook3_master test > /workspace/mysql/backup/test.dmp"
```
恢复：
```shell
docker exec -i Brook3.mysql bash -c "mysql -uroot -proot brook3_master < /workspace/mysql/backup/test.dmp"
```
```shell
docker exec -i Brook3.mysql bash -c "mysqlbinlog  --no-defaults /workspace/mysql/logs/mysql-bin.000004 | mysql -uroot -proot brook3_master"
```
```shell
docker exec -i Brook3.mysql bash -c "mysqldump -uroot -proot -l -F brook3_master test | mysql -uroot -proot brook3_master"
```