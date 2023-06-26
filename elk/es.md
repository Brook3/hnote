
```sh
GET cron-log-2021.11/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s"
}



GET cron-log-2021.11/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s",
  "query": {
    "match_all": {}
  }
}


GET cron-log-2021.11/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s",
  "query": {
    "match_all": {}
  }
}



GET cron-log-2021.11/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s",
  "query": {
    "match": {
      "category": "MP_SCANCODE_REPORT_CURL"
    }
  }
}

GET cron-log-2021.11/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s",
  "query": {
          "range": {
            "@timestamp": {
              "gte": "2021-11-04 00:00:00",
              "lt": "2021-11-05 00:00:00",
                "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            }
          }
  }
}


GET cron-log-2021.11/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s",
  "query": {
    "bool": {
      "filter": [
        {
          "term": {
            "category.keyword": "MP_SCANCODE_REPORT_CURL"
          }
        },
        {
          
          "range": {
            "@timestamp": {
              "gte": "2021-11-04 00:00:00",
              "lt": "2021-11-05 00:00:00",
                "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            }
          }
        }
      ]
    }
  }
}



GET real_time_count/_search
{
  "from": 0,
  "size": 20,
  "timeout": "60s",
  "query": {
    "bool": {
      "filter": [
        {
          "term": {
            "type": "圈子视频直播"
          }
        },
        {
          
          "range": {
            "@timestamp": {
              "gte": "2021-11-04 00:00:00",
              "lt": "2021-11-05 00:00:00",
                "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            }
          }
        }
      ]
    }
  }
}


GET cron-log*/_search
{
  "from": 0,
  "size": 2,
  "timeout": "60s",
  "query": {
    "bool": {
      "filter": [
        {
          "term": {
            "category.keyword": "MP_SCANCODE_REPORT_CURL"
          }
        },
        {
          
          "range": {
            "@timestamp": {
              "gte": "2021-10-08 00:00:00",
              "lt": "2021-11-04 00:00:00",
                "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            }
          }
        }
      ]
    }
  },
  "aggs": {
    "group_by_date": {
      "date_histogram": {
        "field": "@timestamp",
        "interval": "day",
        "min_doc_count": 0
      }
    }
  }
}
```
