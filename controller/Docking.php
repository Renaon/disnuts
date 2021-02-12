<?php


ini_set('soap.wsdl_cache_enabled', 0 );
ini_set('soap.wsdl_cache_ttl', 0);

class Docking{
    protected  $options = array();
//    private $arrContextOptions;
    private $client;
    protected $sauce;



    private function getWSDL($url): string
    {
        $wsdl = $url. '?wsdl';
        $this->sauce = $url;
//        $this->arrContextOptions=array(
//            'ssl'=>array(
//                'verify_peer'=>false,
//                'verify_peer_name'=>false,
//                'allow_self_signed' => true
//            ),
//            'https' => array(
//                'curl_verify_ssl_peer'  => false,
//                'curl_verify_ssl_host'  => false)
//        );
        return $wsdl;
    }

    private function getOptions(): array
    {
        $this->options =array('location'=>$this->sauce,'login' => 'admin', 'password' => "11016");
        return $this->options;
    }

    public function connect1C($url): ?SoapClient
    {

        try {
            $this->client = new SoapClient($this->getWSDL($url), $this->getOptions());
        }catch(SoapFault $e) {
            trigger_error('Ошибка подключения или внутренняя ошибка сервера. Не удалось связаться с базой 1С.', E_USER_ERROR);
            var_dump($e);
        }

        if (is_soap_fault($this->client)){
            trigger_error('Ошибка подключения или внутренняя ошибка сервера. Не удалось связаться с базой 1С.', E_ERROR);
            return null;
        }
        return $this->client;
    }



}
?>
