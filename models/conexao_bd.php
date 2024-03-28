<?php

$host = "localhost";
$user_name = "root";
$password = "";
$db_name = "dbintre";

$conexao = mysqli_connect($host, $user_name, $password,$db_name);

// if($conexao = mysqli_connect_error()){
//     echo "Erro na conexão: " + mysqli_connect_error();
// }
// else{
//     echo "Sucesso na conexão";
// }