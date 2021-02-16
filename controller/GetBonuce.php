<?php

    class GetBonuce extends Docking
    {
        private $result;
        public function __construct($client)
        {
            $params = array(
                'ИдентификаторКарты' => '739f3250-53d7-11eb-a2cb-704d7b28f39a',
                'ДатаЗапроса' => date('Y-m-d H:i:s')
            );
            $result = $client->ПолучитьОстатокБонусов($params);
            var_dump($result);
            $this->result = $result;
        }

        public function getResult(){
            return $this->result->{'return'}->{'РезультатЗапроса'}->{'КоличествоБаллов'};
        }
    }