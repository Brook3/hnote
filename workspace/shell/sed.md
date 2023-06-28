# 1. sed
查看指定行

## 1.1. sed -n "开始行，结束行p" 文件名

```shell
sed -n '70,75p' date.log             输出第70行到第75行的内容

sed -n '6p;260,400p; ' 文件名    输出第6行 和 260到400行

sed -n 5p 文件名                       输出第5行
```


## 1.2. 结合tail使用
```shell
# 在tail的结果中再进行指定行数的查看
tail -n 2000 /data1/log/php/fpm-php.www.log | sed -n '1,100p'
```