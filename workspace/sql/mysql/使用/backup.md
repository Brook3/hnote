# mysql定时备份
```shell
# 1. 创建备份目录
cd /home
mkdir backup
cd backup
# 2. 创建备份 Shell 脚本:
vim DatabaseName.sh

#!/bin/bash
/usr/local/mysql/bin/mysqldump -uusername -ppassword DatabaseName > /home/backup/DatabaseName_$(date +%Y%m%d_%H%M%S).sql

# 3. 对备份进行压缩：
#!/bin/bash
/usr/local/mysql/bin/mysqldump -uusername -ppassword DatabaseName | gzip > /home/backup/DatabaseName_$(date +%Y%m%d_%H%M%S).sql.gz

# 注意：
把 username 替换为实际的用户名；
把 password 替换为实际的密码；
把 DatabaseName 替换为实际的数据库名；
添加可执行权限

chmod u+x DatabaseName.sh
# 4. 添加计划任务
crontab -e
01   3 * * * root/home/backup/DatabaseName.sh
表示每天 3 点钟执行备份
```