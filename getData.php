<?php

require('./socket.php');
require('./socketClient.php');

//$socket = new socketClient('10.13.100.68', 8001);
$socket = new socketClient('179.156.26.52', 8002);

//
//if (isset($_GET['sensor'])) {
//    echo 'ok';
////    $packet = array('OP' => '1','sensor' => '1',);
////    echo $socket->send(json_encode($packet));
//}
//
////setando valor de tensão para a bomba
//if (isset($_GET['bomba'])) {
//    if (isset($_GET['tensao'])) {
//        $setPoint = $_GET['tensao'];
//
//        //enviando o comando para o servidor
//        $packet = array(
//            'OP' => '0',
//            'tensao' => '' . $setPoint . '',
//        );
//        $socket->send(json_encode($packet));
//        echo json_encode(floatval($setPoint));
//    }
//}
//
//if (isset($_GET['tanque'])) {
//    if (isset($_GET['nivel'])) {
//        $setPoint = $_GET['nivel'];
//        $setTanque = $_GET['tanque'];
//
////        enviando o comando para o servidor
//        $packet = array(
//            'OP' => '2',
//            'tanque' => '' . $setTanque . '',
//            'altura' => '' . $setPoint . '',
//        );
//        $response = $socket->send(json_encode($packet));
//        $nivel = json_decode($response, true)['response'];
//        echo json_encode(floatVal($nivel));
//    }
//}
//
// --- Novo
// ---------------------------------------- LEITURA DOS DADOS
if (isset($_GET['leitura'])) {
    $packet = array('comando' => 0,);
    echo $socket->send(json_encode($packet));
}

// ---------------------------------------- COMANDO NA PLANTA
if (isset($_GET['controle'])) {
    if (isset($_GET['malha'])) {
//        if (isset($_GET['sinal'])) {

            //Dados do sinal
            $sinal_tipo = $_GET['sgntipo'];
            $amp_max = (float) $_GET['ampmax'];
            $amp_min = (float) $_GET['ampmin'];
            $periodo_max = (float) $_GET['periodomax'];
            $periodo_min = (float) $_GET['periodomin'];
            $offset = (float) $_GET['offset'];

            if ($_GET['malha'] === 'true') {                                      //malha aberta
                $packet = array(
                    'comando' => 1,
                    'malha_aberta' => true,
                    'com_sinal' => true,
                    'sinal' => array(
                        'tipo' => $sinal_tipo,
                        'amp_max' => $amp_max,
                        'amp_min' => $amp_min,
                        'periodo_max' => $periodo_max,
                        'periodo_min' => $periodo_min,
                        'offset' => $offset,
                    )
                );
//                echo json_encode($packet);
                echo $socket->send(json_encode($packet));
            } else {                                                            //malha fechada
                //Dados do controle
                $ctrl_tipo = $_GET['ctrltipo'];
                $kp = (float) $_GET['kp'];
                $ki = (float) $_GET['ki'];
                $kd = (float) $_GET['kd'];

                if ($_GET['controle'] === 'true') {                             //malha fechada COM sinal de controle
                    $packet = array(
                        'comando' => 1,
                        'malha_aberta' => false,
                        'com_sinal' => true,
                        'sinal' => array(
                            'tipo' => $sinal_tipo,
                            'amp_max' => $amp_max,
                            'amp_min' => $amp_min,
                            'periodo_max' => $periodo_max,
                            'periodo_min' => $periodo_min,
                            'offset' => $offset,
                        ),
                        'controle' => array(
                            'tipo' => $ctrl_tipo,
                            'Kp' => $kp,
                            'Ki' => $ki,
                            'Kd' => $kd,
                        )
                    );
//                    echo json_encode($packet);
                    echo $socket->send(json_encode($packet));
                } else {                                                        //malha fechada SEM sinal de controle
                    $packet = array(
                        'comando' => 1,
                        'malha_aberta' => false,
                        'com_sinal' => false,
                        'controle' => array(
                            'tipo' => $ctrl_tipo,
                            'Kp' => $kp,
                            'Ki' => $ki,
                            'Kd' => $kd,
                        )
                    );
//                    echo json_encode($packet);
                    echo $socket->send(json_encode($packet));
                }
            }
//        }
    }
}


// ---------------------------------------- ABORTAR PLANTA