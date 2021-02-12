<?php

    class GetBonuce extends Docking
    {

        public function __construct($client)
        {
            // $_SERVER['REQUEST_TIME']
//            $time["ДатаЗапроса"] = date('Y-m-d H:i:s');
//            $id["ИдентификаторКарты"] = '04';
            $params = array(
                'ИдентификаторКарты' => '739f3250-53d7-11eb-a2cb-704d7b28f39a',
                'ДатаЗапроса' => date('Y-m-d H:i:s')
            );
            $result = $client->ПолучитьОстатокБонусов($params);
            echo $result;
        }
    }