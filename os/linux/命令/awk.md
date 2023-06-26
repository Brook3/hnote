# awk

```shell
docker images | awk '$2=="'${MYSQLIMAGESTAG}'"' | grep -c ${MYSQLIMAGESNAME}
```