# 1. docker
```shell
docker exec Brook3.mysql mysqlbinlog --no-defaults -vv --base64-output=decode-rows /workspace/mysql/logs/mysql-bin.000003 | less
# 1. --no-defaults 加这个参数的原因是：mysqlbinlog本身的问题导致default-character-set报错
# 2. -vv --base64-output=decode-rows 是为了查看格式为row的日志。否则为乱码
# 3. less 方便查看
```