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

## 报500 Internal Server Error
post请求报错：
```nginx
2021/08/09 11:00:43 [crit] 41#41: *453627 open() "/var/tmp/nginx/client_body/0000000003" failed (13: Permission denied), client: 172.20.3.22, server: brook3.com, request: "POST /admin/qaAnswer HTTP/1.1", host: "brook3.com", referrer: "https://brook3.com/admin2/main/manage?tab=simple"
```
或者报错（摘自网络）：
```nginx
2016/09/13 12:40:59 [warn] 15598#0: *35462539 an upstream response is buffered to a temporary file /usr/local/nginx/proxy_temp/9/66/0001124669 while reading upstream, client: 116.226.84.138, server:*****.juxinli.com, request: "POST /devPlatformApi/rest/fengkong/variate_dir HTTP/1.1", upstream: "http://******/devPlatformApi/rest/fengkong/variate_dir", host: "***.***.com"
```

### client_max_body_size
client_max_body_size 默认 1M，表示 客户端请求服务器最大允许大小，在“Content-Length”请求头中指定。如果请求的正文数据大于client_max_body_size，HTTP协议会报错 413 Request Entity Too Large。就是说如果请求的正文大于client_max_body_size，一定是失败的。如果需要上传大文件，一定要修改该值。

### client_body_buffer_size
Nginx分配给请求数据的Buffer大小，如果请求的数据小于client_body_buffer_size直接将数据先在内存中存储。如果请求的值大于client_body_buffer_size小于client_max_body_size，就会将数据先存储到临时文件中，在哪个临时文件中呢？
client_body_temp 指定的路径中，默认该路径值是/tmp/.
所以配置的client_body_temp地址，一定让执行的Nginx的用户组有读写权限。否则，当传输的数据大于client_body_buffer_size，写进临时文件失败会报错


### 分析解决
传输的数据大于client_max_body_size，一定是传不成功的。小于client_body_buffer_size直接在内存中高效存储。如果大于client_body_buffer_size小于client_max_body_size会存储临时文件，临时文件一定要有权限。

从官方给出的定义，是client_body_buffer_size 参数定义过小而发送请求超过默认参数16K大小了。

配置位置：
```nginx
location ~ \.php$ {
    fastcgi_pass   127.0.0.1:9000;
    fastcgi_index  index.php;
    fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
    fastcgi_connect_timeout 60;
    fastcgi_send_timeout 180;
    fastcgi_read_timeout 180;
    fastcgi_buffer_size 128k;
    fastcgi_buffers 256 16k;
    client_body_buffer_size 1024k;
    include        fastcgi_params;
}
```

### 解决办法
1. client_body_buffer_size 1024k; 加大到1024K,因为默认8k|16K太小，请求参数过多时，会出现此类报错。
2. 将临时文件写权限开放
