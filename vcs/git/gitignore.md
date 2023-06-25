# gitignore
## 忽略目录
只忽略当前目录下的文件夹，要使用`/`:
```sh
/code/
/data/
```

## 忽略已经被版本控制的文件
```sh
git rm --cached filename
```

然后将filename写入.gitignore中

