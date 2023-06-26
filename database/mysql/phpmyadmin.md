# phpmyadmin
* 外键

如果加外键的时候没有定义外键名，默认为：sdb_ome_products_ibfk_1，这是第一个
* 开启远程连接

$cfg['AllowArbitraryServer'] = true;
* phpMyadmin发生致命JavaScript错误。是否发送错误报告?

肯定是phpmyadmin配置中有误！比如说注释没有闭合等等
* 配置默认连接
```conf
$cfg['Servers'][$i]['host'] = '127.0.0.1:3306';
$cfg['AllowArbitraryServer'] = true;
$cfg['Servers'][$i]['password'] = 'root123';
$cfg['Servers'][$i]['user'] = 'root';
```