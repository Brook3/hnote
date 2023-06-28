# 1. awk
## 1.1. 简介

## 1.2. 基本用法
### 1.2.1. 按默认的空格或者TAB分割
```shell
$ ps -aux | grep -E 'docker|USER' | awk '{print $2}'
```

### 1.2.2. 指定分隔符
```shell
awk -F  #-F相当于内置变量FS, 指定分割字符
# 使用","分割
$  awk -F, '{print $1,$2}'   log.txt
```

### 1.2.3. 设置变量
```shell
awk -v  # 设置变量
$ awk -va=1 '{print $1,$1+a}' log.txt
```

### 1.2.4. 使用脚本
```shell
awk -f {awk脚本} {文件名}
$ awk -f cal.awk log.txt
```