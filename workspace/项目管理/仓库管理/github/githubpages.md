## github配置
1. 在账号处，Settings=>Pages=>Add a domain处添加域名。这里需要将对应的dns配置到域名管理中
2. 等域名管理中添加好对应等记录后，在这里点击进行校验，通过后即可到对应项目中进行配置
3. 在目标项目中，Settings=>Pages=>GitHub Pages中进行配置，Branch选择想要配置到分支，Custom domain中添加对应到域名即可

## 域名配置
1. 配置一条记录，即github配置1中指定的需要校验的txt类型记录。配置好后，github那边即可验证成功
2. 添加两条记录，配合github配置3中的Custom domain，两条分别是：
    ```sh
    @ cname brook3.github.io
    www cname brook3.github.io
    ```

