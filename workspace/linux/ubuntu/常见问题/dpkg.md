# 1. dpkg
## 1.1. E: Sub-process /usr/bin/dpkg returned an error code (1)
```shell
sudo mv /var/lib/dpkg/info /var/lib/dpkg/info.bk
sudo mkdir /var/lib/dpkg/info
sudo apt-get update
sudo apt-get install -f
sudo mv /var/lib/dpkg/info/* /var/lib/dpkg/info.bk
sudo rm -rf /var/lib/dpkg/info
sudo mv /var/lib/dpkg/info.bk /var/lib/dpkg/info
```