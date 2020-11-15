# 1. php
## 1.1. php端
### 1.1.1. 安装`PHP xdebug`扩展
自行安装
### 1.1.2. 开启xdebug配置
```php.ini
xdebug.var_display_max_children=128
;xdebug.var_display_max_data=4096
xdebug.var_display_max_data=72000
xdebug.var_display_max_depth=5
extension=php_xdebug
```

## 1.2. vscode端
### 1.2.1. 安装debug插件
扩展模块中搜索 `PHP Debug` 进行安装

### 1.2.2. 添加PHP debug配置
.vscode\launch.json
```vscode
{
    // 使用 IntelliSense 了解相关属性。 
    // 悬停以查看现有属性的描述。
    // 欲了解更多信息，请访问: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9000
        },
        {
            "name": "Launch currently open script",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "port": 9000
        }
    ]
}
```

## 1.3. 调试
### 1.3.1. 创建断点
若要在VS代码中创建断点，单击行号左侧的沟槽即可

### 1.3.2. 开启调试
点击运行或者快捷键`F5`

### 1.3.3. 访问接口
在postman中请求接口就会跑到断点处

### 1.3.4. 调试信息
在左侧调试面板部分就是调试的信息