<?php

require('./socket.php');
require('./socketClient.php');

$socket = new socketClient('179.156.26.52', 8001);


if (isset($_GET['sensor'])) {
    echo 'ok';
//    $packet = array('OP' => '1','sensor' => '1',);
//    echo $socket->send(json_encode($packet));
}

if (isset($_GET['bomba'])) {
    $bomba = $_GET['bomba'];
    echo 'funcionando bomba' . $bomba;
}

if (isset($_GET['tanque'])) {
//    $tanque = $_GET['tanque'];
//    echo 'funcionando tanque' . $tanque;

    $result = array();

    $temp = array();

    $temp['value'] = floatval(12.3);

    array_push($result, $temp);

    echo json_encode(floatVal(rand(1, 15).'.'.rand(1, 9)));
}