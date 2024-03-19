<?php
session_start();

if(isset($_POST['submit'])) {
    include_once './php_action/conexao_bd.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    
    $sql_cliente = mysqli_query($conexao, "INSERT INTO tbClientes(nomeCli,emailCli,telCli) VALUES('$nome', '$email', '$telefone')");

    $tipo_imovel = $_POST['imovel'];
    $sql_Ambiente = mysqli_query($conexao, "INSERT INTO tbAmbientes(nomeAmb) VALUES('teste')");

    $codCli = mysqli_query($conexao,"SELECT codCli FROM tbClientes WHERE nomeCli = '$nome'");
    $codCli = mysqli_query($conexao,"SELECT codAmb FROM tbAmbientes WHERE nomeAmb = '$tipo_imovel'");

    // $forma_contato = $_POST[''];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $tipo_servico = $_POST['servico'];
    $metragem = $_POST['metragem'];
    $revestimento = $_POST['revestimento'];
    $marcenaria = $_POST['macenaria'];
    $desc_ambiente = $_POST['desc_ambiente'];

    // banco de dados
    $sql = mysqli_query($conexao, 'INSERT INTO tbprojetos(formaContato, logradouro,bairro,estado,cidade,complemento,tipoImovel,tipoServico,metragem,revestimentos,marcenaria,descricaoAmbiente,codCli, codAmb) 
    VALUES("","","","","","","","",$metragem,"teste","teste", "teste",1,1)'
    );
    // email
    header('Location: ./index.php');
}
header('Location: formulario.html');