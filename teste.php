<?php

require_once 'conn.php';

$conn = new Conexao();

print_r($conn->conectar());
print_r($conn->comandar("{'sensor_superior': '0.0'}"));
print_r($conn->comandar("{'sensor_superior': '0.5'}"));
print_r($conn->comandar("{'sensor_superior': '1.0'}"));
print_r($conn->comandar("{'sensor_superior': '2.0'}"));
print_r($conn->comandar("{'sensor_superior': '5.0'}"));
print_r($conn->fecharSocket());