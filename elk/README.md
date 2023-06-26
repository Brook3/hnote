当多台Filebeat向Logstash传输数据再交给ES入库时，压力会比较大，可以在Filebeat和Logstash之间加上一层消息队列减轻压力，比如Redis、Kafka。由于Redis太吃内存，而Kafka是基于磁盘存储，所以数据量很大的时候更推荐Kafka。整个架构就是：Filebeat > Redis\Kafka > Logstash > Elasticsearch > Kibana。

数据：全部为日志更新后会出现

filebeat->logstash->elasticsearch->kibana
这里在kibana里边索引为 logstash

kafka:
```shell

bash-4.4# kafka-topics.sh --zookeeper zookeeper:2181 --list
__consumer_offsets
filebeat
h_w-log-filebeat
kafka-data
php-logs
test

```

