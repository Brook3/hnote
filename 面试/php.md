# 1. php
## 1.1. PHP文件末尾是否应该加 ?> 结束符号，为什么？

主要防止 include，require 引用文件，把文件末尾可能的回车和空格等字符引用进来，还有一些函数必须在没有任何输出之前调用，就会造成不是期望的结果。PHP文件的编码不包含BOM的UTF8. 这也是PSR-2中的规范：纯PHP代码文件必须省略最后的 ?> 结束标签。

结果

```php
 <?php

$str = 'php';

$str['name'] = array('dogstar');

var_dump($str);
```

参考答案：https://my.oschina.net/dogstar/blog/1543758?from=timeline&isappinstalled=0