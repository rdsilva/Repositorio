<?php

require('./socket.php');
require('./socketClient.php');

$socket = new socketClient('179.156.26.52', 8001);

//$packet = array('Pablo'    => 'Muito VIADO',
//                );
//$response = $socket->send(json_encode($packet));
//
$packet1 = array('comando' => '0',
    'sp' => true,
    'pv' => true,
    'mv' => true,
);
print_r ($socket->send(json_encode($packet1)));

//$packet2 = array('OP' => '1',
//    'sensor' => '1',
//);
//$response .= $socket->send(json_encode($packet2));
//
//$packet3 = array('OP' => '2',
//    'tanque' => '2',
//    'altura' => '20',
//);
//$response .= $socket->send(json_encode($packet3));
//
//$packet4 = array('OP' => '0',
//    'tensao' => '8.0',
//);
//$response .= $socket->send(json_encode($packet4));

//print_r($conn->comandar("{'OP': '0', 'tensao':'2.3'}"));
//print_r($conn->comandar("{'OP': '1', 'sensor':'1'}"));
//print_r($conn->comandar("{'OP': '2', 'tanque':'2', 'altura':'20'}"));
//print_r($conn->comandar("{'OP': '0', 'tensao':'8.0'}"));
//print_r($conn->comandar("{'OP': '1', 'sensor':'2'}"));



$socket->report();
