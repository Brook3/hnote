# 1. 联通php
1. 配置nginx
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
2. 配置php
/etc/php/7.1/fpm/pool.d/www.conf
这个配置为www-data的原因是因为我ps aux | grep nginx看着他是www-data，具体原因暂未研究
; pool name ('www' here)
    [www]
    usr = www-data
    group = www-data
    listen = 127.0.0.1:9000
    listen.owner = www-data
    listen.group = www-data

## 1.1. 网站只有根目录可以访问，子目录不可访问
```shell
$ sudo vim /usr/local/nginx/conf/nginx.conf
检查该配置中的root是否存在。如果不存在请添加。添加后即可正常访问。
    location ~ \.php$ {
        root           /var/www;
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
```