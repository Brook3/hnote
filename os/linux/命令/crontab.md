# crontab
[参考文档](https://www.cnblogs.com/intval/p/5763929.html)
常用命令
===
* crontab -e

编辑，打开后为vim
# crontab -l

查看已经设定的定时任务

定时任务设置
===
```shell
# 格式
分 时 日 月 周 命令
* * * * *　              每分钟执行
*/1 * * * *　            每分钟执行
0 5 * * *                每天五点执行
0-59/2 * * * *           每隔两分钟执行，且是偶数分钟执行，比如2,4,6
1-58/2 * * * *           每隔两分钟执行，且是奇数分钟执行，比如3,5,7
0 0 1,5,10 * *           每个月1号，5号，10号执行
0 0 1-5 * *              每个月 1到5号执行
```

注意事项
===
1. 定时任务修改后 crontab 不需要重启
2. 脚本中路径应为绝对路径，不能写相对路径
3. 

排错
===
1. crontab 服务未启动
```shell
# 查看状态
service crond status
# 基本操作
# 安装服务
yum -y install crontabs
# 启动服务
service crond start
# 关闭服务
service crond stop
# 重启服务
service crond restart
# 重新载入配置
service crond reload
# 加入开机启动
chkconfig –level 35 crond on
```
2. 权限问题
    检查脚本是否有执行权限
3. 路径问题
    crontab中所写路径全部应为绝对路径
4. 时差问题
    查看系统时间等配置，看是否与预期一致
5. 变量问题
    有时候命令中含有变量，但crontab执行时却没有，也会造成执行失败
6. 定时脚本是否书写正确
7. 单独执行脚本是否正常运行
8. 如果脚本正常而定是脚本没有按预期执行
    8.1 在脚本中增加自己的脚本代码，看是否都不执行
    8.2 如果脚本中包含其他脚本语言，其脚本语言用绝对路径试下
        例如：php think ConmmandDo ，将php修改为绝对路径试下
    