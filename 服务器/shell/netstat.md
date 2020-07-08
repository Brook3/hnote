# 1. netstat
## 1.1. 简介
### 1.1.1. 参数
```shell
netstat [选项]

-a或--all：显示所有连线中的Socket；
-A<网络类型>或--<网络类型>：列出该网络类型连线中的相关地址；
-c或--continuous：持续列出网络状态；
-C或--cache：显示路由器配置的快取信息；
-e或--extend：显示网络其他相关信息；
-F或--fib：显示FIB；
-g或--groups：显示多重广播功能群组组员名单；
-h或--help：在线帮助；
-i或--interfaces：显示网络界面信息表单；
-l或--listening：显示监控中的服务器的Socket；
-M或--masquerade：显示伪装的网络连线；
-n或--numeric：直接使用ip地址，而不通过域名服务器；
-N或--netlink或--symbolic：显示网络硬件外围设备的符号连接名称；
-o或--timers：显示计时器；
-p或--programs：显示正在使用Socket的程序识别码和程序名称；
-r或--route：显示Routing Table；
-s或--statistice：显示网络工作信息统计表；
-t或--tcp：显示TCP传输协议的连线状况；
-u或--udp：显示UDP传输协议的连线状况；
-v或--verbose：显示指令执行过程；
-V或--version：显示版本信息；
-w或--raw：显示RAW传输协议的连线状况；
-x或--unix：此参数的效果和指定"-A unix"参数相同；
--ip或--inet：此参数的效果和指定"-A inet"参数相同。
```

## 1.2. 常用操作
### 1.2.1. netstat -anp
查看端口状态
### 1.2.2. 列出所有端口情况
```shell
[root@centos7 ~]# netstat -a      # 列出所有端口
[root@centos7 ~]# netstat -at     # 列出所有TCP端口
[root@centos7 ~]# netstat -au     # 列出所有UDP端口
```
### 1.2.3. 列出所有处于监听状态的 Sockets
```shell
[root@centos7 ~]# netstat -l   # 只显示监听端口
[root@centos7 ~]# netstat -lt  # 显示监听TCP端口
[root@centos7 ~]# netstat -lu  # 显示监听UDP端口
[root@centos7 ~]# netstat -lx  # 显示监听UNIX端口
```
### 1.2.4. 显示每个协议的统计信息
```shell
[root@centos7 ~]# netstat -s     # 显示所有端口的统计信息
[root@centos7 ~]# netstat -st    # 显示所有TCP的统计信息
[root@centos7 ~]# netstat -su    # 显示所有UDP的统计信息
```
### 1.2.5. 显示 PID 和进程名称
```shll
[root@centos7 ~]# netstat -p
```
### 1.2.6. 显示核心路由信息
```shell
[root@centos7 ~]# netstat -r
Kernel IP routing table
Destination     Gateway         Genmask         Flags   MSS Window  irtt Iface
default         gateway         0.0.0.0         UG        0 0          0 eth0
192.168.130.0   0.0.0.0         255.255.255.0   U         0 0          0 eth0
[root@centos7 ~]# netstat -rn   # 显示数字格式，不查询主机名称
Kernel IP routing table
Destination     Gateway         Genmask         Flags   MSS Window  irtt Iface
0.0.0.0         192.168.130.1   0.0.0.0         UG        0 0          0 eth0
192.168.130.0   0.0.0.0         255.255.255.0   U         0 0          0 eth0
[root@centos7 ~]#
```
### 1.2.7. 查看端口和服务
```shell
[root@centos7 ~]# netstat -antp | grep ssh
tcp        0      0 0.0.0.0:22              0.0.0.0:*               LISTEN      734/sshd
tcp        0     52 192.168.130.20:22       119.129.118.189:58737   ESTABLISHED 1846/sshd: root@pts
tcp6       0      0 :::22                   :::*                    LISTEN      734/sshd
[root@centos7 ~]# netstat -antp | grep 22
tcp        0      0 0.0.0.0:22              0.0.0.0:*               LISTEN      734/sshd
tcp        0     52 192.168.130.20:22       119.129.118.189:58737   ESTABLISHED 1846/sshd: root@pts
tcp6       0      0 :::22                   :::*                    LISTEN      734/sshd
[root@centos7 ~]#
```