# group_concat

用于一组的多列信息采集

语法
===
group_concat( [distinct] 要连接的字段 [order by 排序字段 asc/desc  ] [separator '分隔符'] )

功能
===
将group by产生的同一个分组中的值连接起来，返回一个字符串结果。