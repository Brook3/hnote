# 1. error
## 1.1. git error:bad signature 解决方法
今天提交git 的时候出现 bad signature 错误，意思是git下的index文件损坏了，需要重新生成下

```gitbash
$ git status
error: bad signature 0x00000050
fatal: index file corrupt

dcg@dcg-PC MINGW64 /e/Brook3.workSpace/demo/Brook3.note (master)
$ rm -f .git/index

dcg@dcg-PC MINGW64 /e/Brook3.workSpace/demo/Brook3.note (master)
$ git reset
```
