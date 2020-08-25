# 1. nodejs
[参考](https://www.digitalocean.com/community/tutorials/how-to-debug-node-js-code-in-visual-studio-code)

## 1.1. nodejs端配置
### 1.1.1. 启动项目
要以调试方式启动，`inspect`
```nodejs
{
  "scripts": {
    "start": "node bin/www",
    "dev": "./node_modules/.bin/nodemon --inspect bin/www"
  }
}
```

## 1.2. vscode端配置
### 1.2.1. 安装debug插件
在左侧工具栏里搜索，安装对应的插件

### 1.2.2. 添加node debug配置
在界面中添加配置即可，比较简单。配置好的案例如下：
.vscode\launch.json
```vscode
{
    // 使用 IntelliSense 了解相关属性。 
    // 悬停以查看现有属性的描述。
    // 欲了解更多信息，请访问: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Attach by Process ID",
            "processId": "${command:PickProcess}",
            "request": "attach",
            "skipFiles": [
                "<node_internals>/**"
            ],
            "type": "pwa-node"
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