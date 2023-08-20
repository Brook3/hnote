# 模块
```shell
->$ tree app/module/
app/module/
├── __init__.py
├── module1
│   ├── __init__.py
│   ├── module11
│   │   ├── __init__.py
│   │   ├── module11.py
│   │   ├── module12.py
│   ├── module1.py
├── module2
│   ├── __init__.py
│   ├── module2.py
└── module.py

```

## 默认import机制
运行 module1.py ，其中只能正常导入 module11.py ， module12 ，下边的则导入报错：module.py ，module2.py
```shell
$ python app/module/module1/module1.py
['/workspace/code/hcode/python/h/app/module/module1', '/usr/local/lib/python311.zip', '/usr/local/lib/python3.11', '/usr/local/lib/python3.11/lib-dynload', '/workspace/code/hcode/python/h/venv/lib/python3.11/site-packages']
module1-run
module11-run
module12-run
```

可以看出，只能导入子包！！！

主要是在 sys.path 里边默认只动态加入了执行脚本对应的父目录作为搜索路径。故module1兄弟包或者父包都是找不到搜索路径的。

## sys.path.append
```
import sys
sys.path.append('/workspace/code/hcode/python/h')
```
注意：当同一目录下，有同名的文件和目录，则会异常。可能优先认为是文件。
即：app/server.py 与 app/server/live.py 引入会异常，报没有server这个包

## 优雅的解决引入包
当然，可以手动将目录添加到 sys.path 中，然后就可以进行导入包了。

但是，当脚本数量比较多时，这个手动添加到方式，则会散落到项目的各个地方，就像有蟑螂爬在各个地方似的，及其难受，一点都不优雅。

代码，不是只要能跑就行！！！

## 解决方案
基于导入机制，项目采用单一文件入口。这样，项目就相当于一个包，然后里边的文件，都可以作为子包进行任意导入

完美
