# 1. web
## 1.1. 七层模型与协议

## 1.2. 无状态
### 1.2.1. session
### 1.2.2. cookie
### 1.2.3. token
jwt

## 1.3. restful api



## 1.4. 区别

### 1.4.1. session,cookie

-----

1. 存放位置

session存放serverfile
2. 安全性
3. 服务器压力
4. 使用方式
5. 保存数据大小

单个cookie保存的数据不能超过4K，很多浏览器都限制一个站点最多保存20个cookie

### 1.4.2. get,post

get通过http协议通过url参数传递进行接收，post是实体数据，通过表单提交

-----

1. 可见性
2. 安全性
3. 数据类型限制ascll码
4. 数据长度限制
5. 历史记录，参数
6. 缓存
7. 书签
8. 后退/刷新
无害数据会被重新提交
9. 编码类型

### 1.4.3. IP/PV/UV
### 1.4.4. 状态码

- 200/204/302/304/401/403/404/500/502/504