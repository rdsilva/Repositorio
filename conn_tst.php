<?php

header("Content-type: text/html; charset=utf-8");

$ip = '179.156.26.52';
$port = 8001;

if (!($sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Não foi possível criar socket: [$errorcode] $errormsg <br>");
}

echo "Socket criado com sucesso!<br>";

if (!socket_connect($sock, $ip, $port)) {
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Não foi possível conectar: [$errorcode] $errormsg <br>");
}

echo "Conexão estabelecida!<br>";


$message = json_encode("{'sensor_superior': '0.0'}");

//Enviando mensagem para o middleware
if (!socket_send($sock, $message, strlen($message), 0)) {
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Não foi possível enviar mensagem REAL: [$errorcode] $errormsg <br>");
}

echo "Mensagem enviada com sucesso!<br>";

//Recebendo mensagem do middleware
if (socket_recv($sock, $buf, 2045, MSG_WAITALL) === FALSE) {
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Não foi possível receber mensagem : [$errorcode] $errormsg <br>");
}

//imprimindo a mensagem
print_r($buf);

socket_close($sock);