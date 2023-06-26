select survey_id,card_num,source,score from sdb_b2c_hug where prize='' and luckytime='' group by card_num having count(card_num)=2



这个是可以的。sum之后给他重命名，后边直接用！！！
	$oOrderItems=kernel::database()->select("select sum(i.`nums`) total_nums,o.`shop_id` from `sdb_ome_order_items` i,`sdb_ome_orders` o where i.`order_id`=o.`order_id` and o.`process_status` in ('unconfirmed','confirmed','splitting') and i.`product_id`=".$product['product_id']." group by o.`shop_id` having total_nums!=2");
