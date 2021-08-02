# 1. 介绍
[参照](https://github.com/tamlok/vnote/blob/master/README_zh.md)
 
# 2. 安装
## 2.1. arch
```shell
yay -S vnote
```
## 2.2. windows
     [home](https://vnotex.github.io/vnote/en_us/#!index.md)
## 2.3. linux
     1. 获取源代码
     ```shell
     git clone https://github.com/tamlok/vnote.git vnote.git
    cd vnote.git
    git submodule update --init
     ```
     2. qt5.9
          我这里是用run的那种方式安装的
     3. 编译安装
     ```shell
     cd vnote.git
    mkdir build
    cd build
    qmake ../VNote.pro
    make
    sudo make install
     ```
     4. 这里在make的时候会报错。可看下述报错
     这里报错后，处理完svg的问题，然后在qt creator中进行操作：导入项目VNote.pro后，进行编译。在选项设置中，构建与运行：将构建套件（kit）中手动设置的删除，只剩下自动检测的QT5.9 GCC，然后进行编译。会编译比较长的时
间
     5. 查看编译的文件，然后在该目录打开命令行，操作
     ```shell
     sudo make install
     ```
     6. 完成
 
# 3. 可能会遇到的报错
 1. Project ERROR: Unknown module(s) in QT: webenginewidgets webchannel svg
      make: *** [Makefile:100：sub-src-make_first] 错误 3
 
处理：
```shell
  sudo apt-get install libqt5svg5*
```
 
然后svg的问题会处理好。
 
剩下的两个没有处理，命令行执行
