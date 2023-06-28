1.没有ifconfig命令
    yum search ifconfig
    yum install ...
2.配置静态ip 
    BOOTPROTO=static
    DNS1=192.168.122.1
    IPADDR=192.168.122.122
    NETMASK=255.255.122.255
    GATEWAY=192.168.122.1
    注意：
        122为自动分配地址时看到的122,具体可以之后再研究。
        如果想要改为动态，将 BOOTPROTO=dhcp 即可。
        修改完成：service network restart
3.修改主机名
    3.1 方法一
        hostnamectl set-hostname centos7
    3.2 方法二
        vi /etc/hostname
        centos7
4.增加新用户
    useradd brook3
    passwd brook3
5.
