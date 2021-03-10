<?php
use Bitrix\Main\Entity;
use Bitrix\Main\Application;
require ('/home/bitrix/www/bitrix/.settings.php');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

class DBConnect extends Entity\DataManager {
    private $login;
    private $host;
    private $password;
    private $db_name;
    private $connect;

//        $this->host = '192.168.1.128';
//        $this->login = 'bitrix0';
//        $this->password = 'y+rA3k9-X+up]Z&jJ9j5';
//        $this->db_name = "sitemanager";

    public static function getTableName()
    {
        return 'b_users';
    }

    public function __construct(){
        $this->host = '192.168.1.128';
        $this->login = 'bitrix0';
        $this->password = 'y+rA3k9-X+up]Z&jJ9j5';
        $this->db_name = "sitemanager";

        $connect = Application::getConnection();
        $this->connect = $connect;
        $sqlHelper = $connect->getSqlHelper();
//        $this->createUser('mrs_addams', 'Martizia', 'Addams', 'addams@gmail.com');
        $this->searchCard('739f3250-53d7-11eb-a2cb-704d7b28f39a');
    }

    public function createUser($login, $name, $lastname, $email = null){
        $sql = "INSERT INTO b_user(LOGIN,NAME,LAST_NAME, EMAIL) VALUES('$login', '$name', '$lastname', '$email');";
        $recordset = $this->connect->query($sql);
    }

    public function dropUser($login){
        $sql = "DELETE FROM b_user WHERE LOGIN='$login';";
        $recordset = $this->connect->query($sql);
    }

    public function putDiscount($card_id, $balance, $name){
        $sql = "UPDATE b_catalog_discount SET SALE_ID = '$card_id', VALUE = '$balance', NAME = '$name'";
        $recordset = $this->connect->query($sql);
    }

    private function searchCard($card_id){
        $sql = "SELECT ID FROM b_catalog_discount WHERE SALE_ID = '$card_id';";
        $recordset = $this->connect->query($sql);
    }

    public function createCard($card_id, $balance = 0,$name){
        $sql = "INSERT INTO b_catalog_discount(SALE_ID, NAME, VALUE) VALUES('$card_id','$name','$balance');";
        $recordset = $this->connect->query($sql);
    }


}