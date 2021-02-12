<?php
    require('controller/Docking.php');
    require('controller/GetBonuce.php');

    $connect = new Docking();
    $pain = new GetBonuce($connect->connect1C('http://localhost:81/testing_sailing/ws/DiscountService.1cws'));
    (int) $num = $pain->getResult();
    echo $num;