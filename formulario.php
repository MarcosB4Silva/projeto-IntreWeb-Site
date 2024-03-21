<?php
session_start();

if (isset ($_POST['submit'])) {
    include_once './php_action/conexao_bd.php';

    // Informações do cliente
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql_verifica_cliente = mysqli_query($conexao, "SELECT codCli FROM tbClientes WHERE nomeCli = '$nome' and emailCli = '$email'");
    print_r($sql_verifica_cliente);
    // Verificando se o usuario ja foi cadastrado antes
    if (mysqli_num_rows($sql_verifica_cliente) > 0) {
        $codCli = mysqli_query($conexao, "SELECT codCli FROM tbClientes WHERE nomeCli = '$nome' and emailCli = '$email'"); // Retornando codigo do usuario ja casdastrado
        echo "Retorna codigo usu";
    } else {
        //Cadastrando e retornando codigo do usuario
        $sql_cliente = mysqli_query($conexao, "INSERT INTO tbClientes(nomeCli,emailCli,telCli) VALUES('$nome', '$email', '$telefone')");
        $codCli = mysqli_query($conexao, "SELECT codCli FROM tbClientes WHERE nomeCli = '$nome' and emailCli = '$email'");
        echo "Não retorna";
    }

    // Fazendo um array com os ambientes do do fomulario
    $ambiente = $_POST['ambiente'];
    $total_ambientes = "";

    foreach ($ambiente as $quantidade) {
        // echo $quantidade;
        $total_ambientes .= $quantidade;
    }
    // ! TESTANDO ARRAY
    // echo $total_ambientes;

    $sql_ambiente = mysqli_query($conexao, "INSERT INTO tbAmbientes(nomeAmb) VALUES('$total_ambientes')");
    $codAmb = mysqli_query($conexao, "SELECT codAmb FROM tbAmbientes WHERE nomeAmb = '$total_ambientes'");

    // converter para inteiro =  intval(codAmb);
    $Cli = intval($codCli);
    $Amb = intval($codAmb);

    // $forma_contato = $_POST[''];
    $tipo_imovel = $_POST['imovel'];
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

    // ! ERRO: arrumar erro na insersão do projeto
    $sql = mysqli_query(
        $conexao,
        'INSERT INTO tbprojetos(formaContato, logradouro,bairro,estado,cidade,complemento,tipoImovel,tipoServico,metragem,revestimentos,marcenaria,descricaoAmbiente,codCli, codAmb) 
    VALUES("teste","$logradouro","$bairro","$estado","$cidade","$complemento","$tipo_imovel","$tipo_servico","$metragem","$revestimento","$macenaria", "$desc_ambiete",  "$Cli", "$Amb")'
    );
    // email
    header('Location: index.php');
}
// header('Location: formulario.html');