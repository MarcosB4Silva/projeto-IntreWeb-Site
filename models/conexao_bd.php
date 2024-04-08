<?php

$host = "10.23.49.42:3306";
$user_name = "admindb";
$password = "123456";
// $host = "localhost";
// $user_name = "root";
// $password = "";
$db_name = "dbIntre";

$conexao = mysqli_connect($host, $user_name, $password,$db_name);

// if($conexao = mysqli_connect_error()){
//     echo "Erro na conexão: " + mysqli_connect_error();
// }
// else{
//     echo "Sucesso na conexão";
// }