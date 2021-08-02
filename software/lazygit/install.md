# 1. install
```shell
yay -S lazygit
```

## 1.1. proxy
go相关官方地址被墙真的很让人暴躁：

go版本：go version go1.13.6 windows/amd64


安装gin框架时使用了：go get github.com/kardianos/govendor

然后：

go get github.com/kardianos/govendor: module github.com/kardianos/govendor: Get https://proxy.golang.org/github.com/kardianos/govendor/@v/list: dial tcp 172.217.160.113:443: connectex: A connection attempt failed because the connected party did not properly respond
 after a period of time, or established connection failed because connected host has failed to respond.

看提示就是连接不上了，关掉VPN，直接访问地址，得了还是被墙了

网上找了个能用的代理地址：https://goproxy.cn

执行命令：
```shell
go env -w GOPROXY=https://goproxy.cn
```
重新执行命令，通过！