# 1. php
## 1.1. 进程
进程：执行中的程序。三态：阻塞、就绪、运行
线程：进程中的一个实体。三态：阻塞、就绪、运行。系统控制
协程：轻量级的线程。用户控制


## 1.2. PHP文件末尾是否应该加 ?> 结束符号，为什么？

主要防止 include，require 引用文件，把文件末尾可能的回车和空格等字符引用进来，还有一些函数必须在没有任何输出之前调用，就会造成不是期望的结果。PHP文件的编码不包含BOM的UTF8. 这也是PSR-2中的规范：纯PHP代码文件必须省略最后的 ?> 结束标签。
结果
```php
 <?php
$str = 'php';
$str['name'] = array('dogstar');
var_dump($str);
```

参考答案：https://my.oschina.net/dogstar/blog/1543758?from=timeline&isappinstalled=0


## 1.3. class
- 类的定义和实例化
- construct/destruct
- 对象引用
- 继承/访问控制/static/final/接口/多态/抽象/const
- 数据访问this/parent/self/static
- 魔术方法
- include,require
使用 include 语句包含外部文件时，只有代码执行到 include 语句时才会将外部文件包含进来，当所包含的外部文件发生错误时，系统会给出一个警告，而整个 PHP 程序会继续向下执行。
require 语句的使用方法与 include 语句类似，都是实现对外部文件的引用。在 PHP 文件执行之前，PHP 解析器会用被引用文件的全部内容替换 require 语句，然后与 require 语句之外的其他语句组成新的 PHP 文件，最后再按新 PHP 文件执行程序代码。
include_once 语句和 include 语句类似，唯一的区别就是如果包含的文件已经被包含过，就不会再次包含。include_once 可以确保在脚本执行期间同一个文件只被包含一次，以避免函数重定义、变量重新赋值等问题。
require_once 语句是 require 语句的延伸，它的功能与 require 语句基本类似，不同的是，在应用 require_once 语句时会先检查要包含的文件是不是已经在该程序中的其他地方被包含过，如果有，则不会再次重复包含该文件。

- static/self
1. self调用类自身方法/自身静态成员和类常量。不能访问类属性
2. static访问类自身静态成员

### 1.3.1. url处理
```php
server

客户端ip
$_SERVER['REMOTE_ADDR']
服务器ip
$_SERVER['SERVER_ADDR']
host
$_SERVER['HTTP_HOST']
当前页面的前一页面
$_SERVER['HTTP_REFERER']
判断设备
$_SERVER['HTTP_USER_AGENT']
echo'http://'.$_SERVER[HTTP_REFERER'].'-http://'.$_SERVER['HTTP_HOST'].$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URL']
```


## 1.4. 设计模式
- 单例模式
    饿汉模式 乐观模式
- 工厂模式
- 观察者模式
- 策略模式
- 修饰模式
- 注册树模式

## 1.5. php中如何解决控制只有一个进程访问同一个文件
```php
1. $handle=fopen($file_name,'a+');
2. if(flock($handle,LOCK_EX)){
3. fwrite($handle,'aaa');
4. flock($handle,LOCK_UN);
5. }else{
    echo'被占用';
7. }
```
猴大王

open_door转换为OpenDoor

ucfirst

1,1,2,3,5,8...求第m个数是多少

$i=($i-1)+($i-2)

回文

字符串反转
strrev


## 1.6. 目录/文件的遍历
```php
functionget_dir_info($dir){
    $handle=opendir($dir);
    while(($file=readdir($handle))!==false){
    if($file=='..'||$file=='.'){
        continue;
    }
    if(is_dir($dir.'/'.$file)){
        $files[$file]=get_dir_info($dir.'/'.$file);
        }else{
            $files[]=$file;
        }
    }
    closedir($handle);
    return$files;
}
```
