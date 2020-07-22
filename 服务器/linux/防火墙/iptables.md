# 1. iptables
1. 禁用firewall防火墙
    停止firewall：
        $ systemctl stop firewalld.service
    禁止firewall开机启动：
        $ systemctl disable firewalld.service
2. 安装
    安装iptables服务：
        $ sudo yum -y install iptables-services
3. 基本操作
    查看防火墙状态：
        $ service iptables status
        ● iptables.service - IPv4 firewall with iptables
        Loaded: loaded (/usr/lib/systemd/system/iptables.service; disabled; vendor preset: disabled)
        Active: inactive (dead)
    启动防火墙：
        $ service iptables start

        $ service iptables status
        ● iptables.service - IPv4 firewall with iptables
        Loaded: loaded (/usr/lib/systemd/system/iptables.service; disabled; vendor preset: disabled)
        Active: active (exited) since 日 2018-05-20 04:58:23 EDT; 11s ago
        Process: 2877 ExecStart=/usr/libexec/iptables/iptables.init start (code=exited, status=0/SUCCESS)
        Main PID: 2877 (code=exited, status=0/SUCCESS)
    停止防火墙：
        $ service iptables stop

        ● iptables.service - IPv4 firewall with iptables
        Loaded: loaded (/usr/lib/systemd/system/iptables.service; disabled; vendor preset: disabled)
        Active: inactive (dead) since 日 2018-05-20 05:02:54 EDT; 9s ago
        Process: 2950 ExecStop=/usr/libexec/iptables/iptables.init stop (code=exited, status=0/SUCCESS)
        Process: 2877 ExecStart=/usr/libexec/iptables/iptables.init start (code=exited, status=0/SUCCESS)
        Main PID: 2877 (code=exited, status=0/SUCCESS)
    重启防火墙：
        $ service iptables restart
    永久关闭防火墙：
        $ chkconfig iptables off #未生效，待研究
    永久关闭后重启：
        $ chkconfig iptables on #未测试，待研究

4. 配置
        $ vim /etc/sysconfig/iptables
    增加需要的端口号（修改后恢复权限）：
        -A INPUT -p tcp -m state --state NEW -m tcp --dport 80 -j ACCEPT

5. 配置后重启
        $ service iptables restart
