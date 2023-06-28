0.重启
    service sshd restart
1.密码连接
    ssh root@192.168.122.122
    输入密码即可
2.优化配置
    2.1 服务器配置文件：/etc/ssh/sshd_config
	禁止root用户远程登陆
            PermitRootLogin no 
        禁止使用空密码的用户登陆
            PermitEmptyPasswords no
        使用root才能运行sshd
            UsePAM yes
        不使用DNS
            UseDNS no
        修改端口号
            Port 52113
        在免密码登陆配置完成后，可以取消密码登陆：
#禁用密码验证
PasswordAuthentication no
#启用密钥验证
RSAAuthentication yes
PubkeyAuthentication yes
#指定公钥数据库文件
AuthorsizedKeysFile.ssh/authorized_keys
        
        
        
    2.2 客户端配置：/etc/ssh/ssh_config
3.免密码登陆
    3.1 ubuntu生成密钥公钥：
        ssh-keygen -t rsa
        之后会在该账户下生成密钥和公钥两个文件：
            .ssh/id_rsa
            .ssh/id_rsa.pub
    3.2 将密钥拷贝到想要远程登陆的账户的.ssh/authorized_keys中
        scp /home/brook3/.ssh/id_rsa.pub brook3@192.168.122.122:~
        这里的/home/brook3/.ssh/id_rsa.pub为文件，如果你在该目录里，可以直接写文件名id_rsa.pub
    3.3 将公钥配置到想要免密码登录的主机的对应帐号中
        cat ~/id_rsa.pub>>~/.ssh/authorized_keys

    可参考：
        http://blog.csdn.net/xyang81/article/details/51477925
        

可参考：
    https://www.cnblogs.com/xiaogan/p/5902846.html
    http://www.linuxidc.com/Linux/2017-09/146944.htm
    http://blog.csdn.net/xyang81/article/details/51477925
