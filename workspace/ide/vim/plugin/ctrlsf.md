[ctrlsf](https://github.com/dyng/ctrlsf.vim)
==
使用rg进行搜索
--
# 依赖安装
### rp
* ubuntu18.10+
```shell
$ sudo apt-get install ripgrep
```
* centos
```shell
$ sudo yum-config-manager --add-repo=https://copr.fedorainfracloud.org/coprs/carlwgeorge/ripgrep/repo/epel-7/carlwgeorge-ripgrep-epel-7.repo
$ sudo yum install ripgrep
```
> 如果是minimal，没有安装yum-config-manager
```shell
$ sudo yum -y install yum-utils
```

# 配置
[详情请见](https://gitlab.com/381654729/env/.config)

# 使用方式
```vim
<space>sf 搜索内容 搜索路径
```
> 搜索路径为空，默认当前路径
> 搜索内容为空，默认光标下的word

[详细操作请查阅](https://github.com/dyng/ctrlsf.vim)

key
---
* ctrlsf
* search
