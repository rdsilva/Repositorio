<?php

require_once 'interfaceConn.php';

class Conexao implements CONN {

    public static $ip = '179.156.26.52';
    private static $port = 8001;
    private static $sock;

    
    function criarSocket() {
        if (!(self::$sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
//          $errorcode = socket_last_error();
//          $errormsg = socket_strerror($errorcode);
//          die("Não foi possível criar socket: [$errorcode] $errormsg <br>");
            return false;
        }
        return true;
    }
    
    function conectar() {
//        if (criarSocket()) {
        if (!(self::$sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
            if (!socket_connect(self::$sock, self::$ip, self::$port)) {
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

    function comandar($cmd) {
        if (!socket_send(self::$sock, $cmd, strlen($cmd), 0)) {
//          $errorcode = socket_last_error();
//          $errormsg = socket_strerror($errorcode);
//          die("Não foi possível enviar mensagem REAL: [$errorcode] $errormsg <br>");
            return false;
        } else {
            if (socket_recv(self::$sock, $buf, 2045, MSG_WAITALL) === FALSE) {
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
        if (!isset(self::$sock)) {
            return false;
        } else {
            socket_close(self::$sock);
        }
    }

    public function setIP($iprcv) {
        self::$ip = $iprcv;
    }

    public function setPort($portrcv) {
        self::$port = $portrcv;
    }

}
