<?php
    require('controller/Docking.php');
    require('controller/GetBonuce.php');
    require('D:/ProjeDBConnect.phprix/disnuts/service/DBConnect.php');
    require ('service/Struct.php');

    use Bitrix\Main\Config\Configuration;
    use Bitrix\Main\DB\Connection;
    use Bitrix\Main\DB\SqlHelper;
    use Bitrix\Main\DB\Result;
    use Bitrix\Main\Application;

    $connect = new Docking();
    $pain = new GetBonuce($connect->connect1C('http://localhost:81/testing_sailing/ws/DiscountService.1cws'));

    (int) $balance = $pain->getResult();
    $identifer = $pain->getID();
    $opData = $pain->getData();

    $info = new Struct($identifer,$balance);

    $db = new DBConnect();
    $db->setTestData();