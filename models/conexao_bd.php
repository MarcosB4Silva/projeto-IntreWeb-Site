<?php

$host = "10.23.49.20:3306";
// $host = "localhost";
$user_name = "senac";
$password = "123";
$db_name = "dbIntre";

$conexao = mysqli_connect($host, $user_name, $password,$db_name);

// if($conexao = mysqli_connect_error()){
//     echo "Erro na conexão: " + mysqli_connect_error();
// }
// else{
//     echo "Sucesso na conexão";
// }