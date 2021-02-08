<?php
    class GetBonuce extends Connect {
        private array $result = array();
        private $soapC = null;

        function __construct($soapC){
            $this->soapC = $soapC;
            purr('00-000005',getdate());

//            try{
//                $soapC->get("00-000005", getdate());
//            }catch (SoapFault $e){
//                echo $e->getMessage();
//            }
        }

        private function purr($cardID, $date): ?array {
            if($this->soapC['success']){
                # Если тип ключа массива является объектом, то сформируем команду запроса
                if(is_object($this->soapC['SOAP'])){
                    try{
                        //$data = array();
                        //$data['options'] = $this->options;
                        $this->result['success'] = true;
                        # Формируем команду 1С:Предприятие
                        # @Handle(Параметр) - является командой 1С:Предприятие
                        $this->result['data'] = $this->soapC['SOAP']->ПолучитьОстатокБонусов($cardID, $date);

                        # Если включен режим отладки добавляем ключ (Для JS console)
                        if ($this->soapC['debug']) {
                            $this->result['debug'] = $this->result['data']->return;
                        }

                        return $this->result;
                    }catch (SoapFault $e) {
                        $this->result['success'] = false;
                        $this->result['title'] = 'Ошибка';
                        $this->result['description'] = 'Невозможно выполнить операцию запроса';

                        # Если включен режим отладки добавляем ключ (Для JS console)
                        if ($this->soapC['debug']) {
                            $this->result['debug'] = $e;
                        }

                        return $this->result; # var_dump($e);
                    }
                }else{
                    $this->result['success'] = false;
                    $this->result['title'] = "ERROR";
                    $this->result['description'] = "Не удается подключиться к Дисконтному серверу";
                    # Если включен режим отладки добавляем ключ (Для JS console)
                    if ($this->soapC['debug']) {
                        $result['debug'] = $this->result['description'];
                    }
                    return $this->result;
                }
            }else return $this->soapC;
        }
    }