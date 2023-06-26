# ssh
> 多个ssh

## 生成
### github
github 在git提交的时候已经调整为使用 `token` 方式进行提交。感觉不太方便，现同意进行`ssh`的方式进行提交
```sh
ssh-keygen -t rsa -C "Brook3@gitlab.com" -f /workspace/app/ssh/gitlab/id_rsa

```

### gitlab
同上，把`-C`后边的表示替换为`Brook3@gitlab.com`即可。后边的密钥也用单独的目录存放。

### other
同上

## 将公钥放到指定位置
`id_rsa.pub`放到指定位置

## 配置
详情见`~/.ssh/config`

## 验证
```sh
ssh -T git@github.com
```

