<?php
    require('controller/Connect.php');
    require('controller/GetBonuce.php');

    $connect = new Connect();
    $connect->connect1C('http://localhost:81/testing_sailing/ws/DiscountService.1cws');
    $request = new GetBonuce($connect);