ubuntu 18.04
### 显卡驱动安装
1. 卸载旧的驱动
    sudo apt-get purge nvidia*
2. 将软件源去除
3. 禁用自带的nouveau nvidia驱动
    vim /etc/modprobe.d/blacklist.conf
    blacklist amd76x_edac
    blacklist vga16fb
    blacklist nouveau
    blacklist rivafb
    blacklist nvidiafb
    blacklist rivatv
    options nouveau modeset=0
4. 更新
    sudo update-initramfs -u
5. 我这里就好了，用的系统的。
    软件和更新现实的是X.Org X server -Nouveau display driver 来自 xserver-xorg-video-nouveau(开源)

### 删除图标
1. 利用软件中心删除该软件（比较简单）
  右键详细跳转到软件中心，删除该软件即可。
2. 如果软件中心没有该软件
    找到程序名，命令行直接删除。不知道程序名一般百度就可以查到
3. 如果以上方式不灵（即软件已删除，快捷方式有残留）
    /usr/share/applications中删除对应的文件即可。例如：reboot.desktop
4. 如果以上方式不灵（下列方法解决一切烦恼）
    $ find / -iname "matlab*desktop"
    我搞了整整一晚上，最后找到了这个方法。我电脑中残留文件位置为：
        /var/lib/snapd/desktop/applications/skype_skypeforlinux.desktop
        /var/lib/snapd/desktop/applications/goldendictionary_goldendict.desktop
    这里的两个desktop和软件名其实是不一样的。删除即可根治。
    $ sudo rm goldendictionary_goldendict.desktop
    如果有差错，可以参考下以下路径：
        /usr/share/applications/下的desktop文件
        /usr/share/applications/mimeinfo.cache文
        ~/.local/share/applications下的desktop文
        ~/.local/share/applications/default.list目录下的文
        ~/.local/share/applications/mimeinfo.cache文
        /etc/gnome/defaults.list文件 
