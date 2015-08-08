<?php

require_once 'interfaceConn.php';

class Conexao implements CONN {

    public $ip = '172.20.10.7';
    private $port = 8002;
    private $sock;

    function conectar() {
        if (criarSocket()) {
            if (!socket_connect($sock, $ip, $port)) {
//              $errorcode = socket_last_error();
//              $errormsg = socket_strerror($errorcode);
//              die("Não foi possível conectar: [$errorcode] $errormsg <br>");
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    private function criarSocket() {
        if (!($sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
//          $errorcode = socket_last_error();
//          $errormsg = socket_strerror($errorcode);
//          die("Não foi possível criar socket: [$errorcode] $errormsg <br>");
            return false;
        }
        return true;
    }

    function comandar($cmd) {
        if (!socket_send($sock, $cmd, strlen($cmd), 0)) {
//          $errorcode = socket_last_error();
//          $errormsg = socket_strerror($errorcode);
//          die("Não foi possível enviar mensagem REAL: [$errorcode] $errormsg <br>");
            return false;
        } else {
            if (socket_recv($sock, $buf, 2045, MSG_WAITALL) === FALSE) {
//            $errorcode = socket_last_error();
//            $errormsg = socket_strerror($errorcode);
//            die("Não foi possível receber mensagem : [$errorcode] $errormsg <br>");
                return false;
            } else {
                return $buf;
            }
        }
    }

    function fecharSocket() {
        if (!isset($sock)) {
            return false;
        } else {
            socket_close($sock);
        }
    }

    public function setIP($iprcv) {
        $ip = $iprcv;
    }

    public function setPort($portrcv) {
        $port = $portrcv;
    }

}
