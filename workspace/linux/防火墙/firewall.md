# 1. firewall
默认安装并开启。
1. 查看firewall服务状态
        $ systemctl status firewalld
        ● firewalld.service - firewalld - dynamic firewall daemon
        Loaded: loaded (/usr/lib/systemd/system/firewalld.service; enabled; vendor preset: enabled)
        Active: active (running) since 日 2018-05-20 02:41:55 EDT; 5min ago
            Docs: man:firewalld(1)
        Main PID: 1337 (firewalld)
        CGroup: /system.slice/firewalld.service
                └─1337 /usr/bin/python -Es /usr/sbin/firewalld --nofork --nopid
2. 查看firewall的状态
        $ sudo firewall-cmd --state
        running
        $ service firewalld stop
        $ sudo firewall-cmd --state
        not running
3. 开启/关闭/重启firealld.service服务
    开启：
        $ service firewalld start
    关闭：
        $ service firewalld stop
    重启：
        $ service firewalld retart
    修改配置后重启：
        $ sudo firewall-cmd --reload
4. 开机启动/禁用
    开机启动：
        $ sudo systemctl enable firewalld
    开机禁用：
        $ sudo systemctl disable firewalld
5. 查询/开放/关闭端口
    查询端口是否开放：
        $ sudo firewall-cmd --query-port=80/tcp
        no
    开放80端口：
        $ sudo firewall-cmd --permanent --add-port=80/tcp
        success
        $ sudo firewall-cmd --reload
        success
        $ sudo firewall-cmd --query-port=80/tcp
        yes
    移除端口：
        $ sudo firewall-cmd --permanent --remove-port=80/tcp
        success
        $ sudo firewall-cmd --reload
        success
        $ sudo firewall-cmd --query-port=80/tcp
        no
> 参数解释

    * firewall-cmd：是Linux提供的操作firewall的一个工具；
    * --permanent：表示设置为持久；
    * --add-port：标识添加的端口；