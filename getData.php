<?php

require('./socket.php');
require('./socketClient.php');

$socket = new socketClient('localhost', 8001);


if (isset($_GET['sensor'])) {
    echo 'ok';
//    $packet = array('OP' => '1','sensor' => '1',);
//    echo $socket->send(json_encode($packet));
}

//setando valor de tensão para a bomba
if (isset($_GET['bomba'])) {
    if (isset($_GET['tensao'])) {
        $setPoint = $_GET['tensao'];

        //enviando o comando para o servidor
        $packet = array(
            'OP' => '0',
            'tensao' => '' . $setPoint . '',
        );
        $socket->send(json_encode($packet));
        echo json_encode(floatval($setPoint));
    }
}

if (isset($_GET['tanque'])) {
    if (isset($_GET['nivel'])) {
        $setPoint = $_GET['nivel'];
        $setTanque = $_GET['tanque'];

//        enviando o comando para o servidor
        $packet = array(
            'OP' => '2',
            'tanque' => '' . $setTanque . '',
            'altura' => '' . $setPoint . '',
        );
        $response = $socket->send(json_encode($packet));
        $nivel = json_decode($response, true)['response'];
        echo json_encode(floatVal($nivel));
    }
}