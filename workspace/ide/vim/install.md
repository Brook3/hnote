vim install
===
卸载旧版本vim
---
```shell
$ sudo yum remove vim* -y
```

安装
---
# 编译安装
```shell
$ git clone https://github.com/vim/vim.git
$ cd vim
$ ./configure --prefix=/usr/local/vim
$ make && sudo make install
$ /usr/local/vim/bin/vim --version
# 添加环境变量，详情可查看381654729/env/.config/vim/vim.bashrc。添加后加载配置，我这里为b3cu
$ b3cu
```
# 利用软件源安装
> 由于该下载受软件源的限制，下载下来的并非vim8，异步都不能用，所以统一使用编译安装
```shell
$ sudo yum install vim
$ sudo apt-get install vim
```

key
---
* vim
