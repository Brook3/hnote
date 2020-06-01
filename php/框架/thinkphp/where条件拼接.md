# 1. where条件拼接
```php
$where['address'] = ['like', '%' . $address . '%'];
```

```php

        $commission_where['c.forgn_id'] = [
            ['EXP', Db::raw('is null')],
            ['not like', '%00163e03d1e2'],
            'or'
        ];
```

## 1.1. find_in_set
对于一些实在复杂的查询，比如find_in_set，也可以直接使用原生SQL语句进行查询，例如：
```php
Db::table('think_user')
    ->where('find_in_set(1,sids)')
    ->select();
```
为了安全起见，我们可以对字符串查询条件使用参数绑定，例如：
```php
Db::table('think_user')
    ->where('find_in_set(:id,sids)',['id'=>$id])
    ->select();
```
可以使用EXP（表达式查询）来实现，具体代码如下：
```php
$data = Db::table('students')->where('exp','FIND_IN_SET(1,sids)')->select();
```
如果用数组条件查询形式的话，那么像下面这么写查询条件即可：
```php
$tags = 2;
$where[] = ['EXP', Db::raw('find_in_set(' . $tags . ',tags)')];
```