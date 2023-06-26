<?php
$dbn="mysql:host=localhost;dbname=ocs;charset=utf8";
$db=new PDO($dbn,"test1","test1");

$sql="select * from sdb_ome_members";
$result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
exit;
var_dump(date('Y-m-d H:i:s','1451793600'));
$str='Sales Order already exist ;  ';
var_dump(rtrim($str,'; '));