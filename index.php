<?php
    require('controller/Docking.php');
    require('controller/GetBonuce.php');

    $connect = new Docking();
    $connect->connect1C('http://localhost:81/testing_sailing/ws/DiscountService.1cws');
