<?php


ini_set('soap.wsdl_cache_enabled', 0 );
ini_set('soap.wsdl_cache_ttl', 0);

class Connect {
    private  $options = null;
    private $arrContextOptions= null;
    private $client= null;
    private $sauce = null;

    private function getWSDL($url){
        $wsdl = $url. '?wsdl';
        $this->sauce = $url;
        $this->arrContextOptions=array(
            'ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed' => true
            ),
            'https' => array(
                'curl_verify_ssl_peer'  => false,
                'curl_verify_ssl_host'  => false)
        );
        return $wsdl;
    }

    private function getOptions(): array
    {
        $this->options =array('location'=>$this->sauce,'login' => 'Администратор', 'password' => null);
        return $this->options;
    }

    public function connect1C($url): bool|SoapClient
    {

        try {
            $this->client = new SoapClient($this->getWSDL($url), $this->getOptions());
        }catch(SoapFault $e) {
            trigger_error('Ошибка подключения или внутренняя ошибка сервера. Не удалось связаться с базой 1С.', E_USER_ERROR);
            var_dump($e);
        }
        //echo 'Раз';
        if (is_soap_fault($this->client)){
            trigger_error('Ошибка подключения или внутренняя ошибка сервера. Не удалось связаться с базой 1С.', E_ERROR);
            return false;
        }
        return $this->client;
    }



}
?>
