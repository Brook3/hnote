# 1. xml转对象
```php
<?php

$xml_str="<room><desk><book>Linux</book><game>皇室战争</game></desk></room>";
$xml_obj=simplexml_load_string($xml_str);
var_dump($xml_obj);
var_dump($xml_obj->desk->book);
exit;



    //数组转XML
    function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                 $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }

    //将XML转为array
    function xmlToArray($xml)
    {    
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
        return $values;
    }
```