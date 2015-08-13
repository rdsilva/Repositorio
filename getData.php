<?php

require('./socket.php');
require('./socketClient.php');

$socket = new socketClient('179.156.26.52', 8001);


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
    }
}

if (isset($_GET['tanque'])) {
    if (isset($_GET['nivel'])) {
        $setPoint = $_GET['nivel'];

//        enviando o comando para o servidor
        $packet = array(
            'OP' => '2',
            'tanque' => '2',
            'altura' => '20',
        );
        $socket->send(json_encode($packet));
    }
}