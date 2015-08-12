<?php

require_once 'conn.php';

$conn = new Conexao();


//OP = 0 = bomba
//OP = 1 = sensor
//OP = 2 = tanque


//setar tensão na bomba:
//{"OP":"0", "tensao":"2.3"} -> float sempre
//ler nível do tanque:
//{"OP":"1", "sensor":"1"}  0->tanque1 ; 1->tanque2; 2->ambos os tanques
//setar nível do tanque:
//{"OP":"2", "tanque":"num.tanque", "altura":"valor"}

print_r($conn->conectar());
print_r($conn->comandar("{'OP': '0', 'tensao':'2.3'}"));
print_r($conn->comandar("{'OP': '1', 'sensor':'1'}"));
print_r($conn->comandar("{'OP': '2', 'tanque':'2', 'altura':'20'}"));
print_r($conn->comandar("{'OP': '0', 'tensao':'8.0'}"));
print_r($conn->comandar("{'OP': '1', 'sensor':'2'}"));
print_r($conn->fecharSocket());