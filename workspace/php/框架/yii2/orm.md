# 1. orm
```php

        $activity_obj =  Activity::find()->where(['is_delete' => IS_DELETE_NO]);
        // 在活动时间内
        $conditions = ['and',
            ['is_delete' => IS_DELETE_NO],
            ['<=', 'start_time', date('Y-m-d H:i:s')],
            ['>=', 'end_time', date('Y-m-d H:i:s')],
        ];
//        $activity_obj->andWhere()
//        $activity_obj->where(['is_delete' => IS_DELETE_NO]);
        if ($channel != '') {
//            $conditions['channel'] = $channel;
            $conditions[] = ['channel' => $channel];
//            $activity_obj->andWhere(['channel' => $channel]);
        }
        if ($type != '') {
            $conditions[] = ['type' => $type];

//            $activity_obj->andWhere(['type' => $type]);
        }
        $activity_obj->where($conditions);
//        exit;
        var_dump($conditions);
        var_dump($activity_obj->createCommand()->rawSql);
        $aa = $activity_obj->one();
//        $aa = $activity_obj->findOne($conditions);
        var_dump($aa);
        exit;
```

```php

        // 在活动时间内
        $conditions = ['and',
            ['is_delete' => IS_DELETE_NO],
            ['<=', 'start_time', date('Y-m-d H:i:s')],
            ['>=', 'end_time', date('Y-m-d H:i:s')],
        ];
        if ($channel != '') {
            $conditions[] = ['channel' => $channel];
        }
        if ($type != '') {
            $conditions[] = ['type' => $type];
        }
        $aa = Activity::find()->where($conditions)->one();
        return $this->renderJson('', $aa->toApiDetailJson());
```

```php
$details = MovieShows::find()->where(['movie_id'=>$id])
           ->andWhere(['location_id'=>$loc_id])
           ->andWhere(['<>','cancel_date', $date])->all();
```

```php
AND ((`name`='张三') OR (`name`='李四') OR (`name`='王五'))
// AND ((`name`='张三') OR (`name`='李四') OR (`name`='王五'))

$query->andWhere(['or',
    ['name' => '张三'],
    ['name' => '李四'],
    ['name' => '王五']
]);
AND (((name=‘张三’) AND (phone=‘15200000000’)) OR ((name=‘李四’) AND (phone=‘15300000000’)))

// AND (((`name`='张三') AND (`phone`='15200000000')) OR ((`name`='李四') AND (`phone`='15300000000')))

$query->andWhere(['or',
    ['and',
        ['name' => '张三'],
        ['phone' => '15200000000']
    ],
    ['and',
        ['name' => '李四'],
        ['phone' => '15300000000']
    ]
]);
```