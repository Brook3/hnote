# 1. install
[web](https://archlinuxstudio.github.io/ArchLinuxTutorial/#/)
[video](https://www.bilibili.com/video/BV11J411a7Tp)

[命令行工具](https://www.cnblogs.com/hi-linux/p/11580086.html)

[极简主义](http://suckless.org/)
dwm + st + ranger + fzf + vim + git
shell + python + go + c

## 1.1. ~~zsh~~
1. 安装zsh
    ```shell
    sudo pacman -S zsh
    ```
2. 将默认的bash切换到zsh
```shell
chsh -s $(which zsh)
```
3. 安装zim
```shell
yay -S zsh-zim-git
```
## 1.2. 自动挂载硬盘
`autofs`工具，配置可实现自动挂载，读写权限
加载到开机启动
不仅可以挂载移动硬盘，还可以挂载网络中的硬盘

## 1.3. 自动联网
使用`wpa_supplicant`和`dhcpcd`

## 1.4. 自动启动中文输入法
`～/.xprofile`中配置开启

## 1.5. 系统托盘
音量
亮度
显卡

## 1.6. 显卡驱动
[cankao](http://ivo-wang.github.io/2018/02/18/a/)