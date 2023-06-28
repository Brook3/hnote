安装教程：
http://blog.csdn.net/STFPHP/article/details/53492723

里边说ubuntu软件库中没有php7.1，所以要用其他的。在ubuntu17.10里其实已经有php7.1了，我就是直接安装好的。


安装过程：
	fpm没有另外安装，新版的php中好像自带，
	php7.1
	mysql-service mysql-client
	nginx
配置过程：
    1.配置nginx
        共有两个地方：/etc/nginx/sites-available/default
	    html:
	        根目录：
		    默认：
			root /var/www/html/
		    改为：
			root /var/www
                主页：index index.html
	    php:
		location ~ \.php$
		将这一段放开，配置：fastcgi_pass 127.0.0.1:9000;
    2.配置php
	/etc/php/7.1/fpm/pool.d/www.conf
	这个配置为www-data的原因是因为我ps aux | grep nginx看着他是www-data，具体原因暂未研究
	; pool name ('www' here)
	    [www]
	    usr = www-data
	    group = www-data
	    listen = 127.0.0.1:9000
	    listen.owner = www-data
            listen.group = www-data
    3.配置mysql
	/etc/mysql/mysql.conf.d/mysqld.cnf
	    还没有研究。但是……/var/lib/mysql进不去lib目录……
    4.如果前几步改完后没有恢复权限，记得修改
	    

更改后nginx和html就正常了。文件权限如果不考虑copy给别人的话，不需要特意修改权限

php和nginx的打通配置：
    /etc/nginx/sites-available/default
    在这里把location放开，有include和127.0.0.1:9000即可
        然后报502
    解决502:
	可以查看日志，php7.1-fpm的日志。ubuntu的在 /var/log/php7.1-fpm.log里
	我遇到的报错是
	       [06-Jan-2018 16:52:43] ERROR: [pool www] cannot get uid for user 'php-fpm'
		[06-Jan-2018 16:52:43] ERROR: FPM initialization failed
		[06-Jan-2018 17:04:30] NOTICE: fpm is running, pid 5387
		[06-Jan-2018 17:04:30] NOTICE: ready to handle connections
		[06-Jan-2018 17:04:30] NOTICE: systemd monitor interval set to 10000ms
	最后修改了一下php7.1-fpm的配置……其实是我改错了。不知道一开始会不会报错
