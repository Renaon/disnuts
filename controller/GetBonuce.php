<?php

    class GetBonuce
    {
        private $result;
        private $id;

        public function __construct($client)
        {
            $params = array(
                'ИдентификаторКарты' => '739f3250-53d7-11eb-a2cb-704d7b28f39a',
                'ДатаЗапроса' => date('Y-m-d H:i:s')
            );
            $this->id = $params['ИдентификаторКарты'];
            $result = $client->ПолучитьОстатокБонусов($params);
            var_dump($result);
            $this->result = $result;
        }

        public function getResult(){
            return $this->result->{'return'}->{'РезультатЗапроса'}->{'КоличествоБаллов'};
        }

        public function getID(){
            return $this->id;
        }

        public function getData(){
            return $this->result->{'return'}->{'РезультатЗапроса'}->{'ДатаОперации'};
        }
    }