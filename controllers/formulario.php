<?php
session_start();

if (isset($_POST['submit'])) {
    include_once '../models/conexao_bd.php';

    //* TABELA DE USUARIO
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $telefone = $_POST['telefone'];

    $sql_verifica_cliente = mysqli_query($conexao, "SELECT codCli FROM tbClientes WHERE nomeCli = '$nome' and emailCli = '$email'");
    if (mysqli_num_rows($sql_verifica_cliente) > 0) {
        // Cliente já cadastrado
        $row = mysqli_fetch_assoc($sql_verifica_cliente);
        $codCli = intval($row['codCli']);
        echo "<br>Código de usuário já cadastrado";
    } else {
        // Cadastrar cliente e obter código
        $sql_cliente = mysqli_query($conexao, "INSERT INTO tbClientes(nomeCli, emailCli, telCli) VALUES('$nome', '$email', '$telefone')");
        $codCli = intval(mysqli_insert_id($conexao));
        echo "<br>Novo código de usuário";
    }

    //* TABELA DE AMBIENTE
    $total_ambientes = implode(' ', $_POST['ambiente']);
    echo "<br> $total_ambientes";
    $sql_verifica_ambiente = mysqli_query($conexao, "SELECT * FROM tbAmbientes WHERE nomeAmb = '$total_ambientes'");
    if (mysqli_num_rows($sql_verifica_ambiente) > 0) {
        $row = mysqli_fetch_assoc($sql_verifica_ambiente);
        $codAmb = intval($row['codAmb']);
        echo "<br>Código do ambiente existente";
    } else {
        $sql_ambiente = mysqli_query($conexao, "INSERT INTO tbAmbientes(nomeAmb) VALUES('$total_ambientes')");
        $codAmb = intval(mysqli_insert_id($conexao));
        echo "<br>Novo codigo de ambiente";
    }

    // Verificando se o codigo foi coletado
    echo "<br>Código do Cliente: $codCli";
    echo "<br>Código do Ambiente: $codAmb";

    //* TABELA DE PROJETO
    // $forma_contato = $_POST[''];
    $tipo_imovel = $_POST['imovel'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $tipo_servico = $_POST['servico'];
    $metragem = intval($_POST['metragem']);
    $revestimento = $_POST['revestimento'];
    $marcenaria = $_POST['macenaria'];
    $desc_ambiente = $_POST['desc_ambiente'];

    //$sql_verifica_projeto = mysqli_query($conexao, "SELECT * FROM tbProjetos WHERE formaContato = 'teste' and logradouro = '$logradouro' and bairro = '$bairro' and estado = '$estado' and cidade = '$cidade' and complemento = '$complemento' and tipoImovel = '$tipo_imovel' and tipoServico = '$tipo_servico' and metragem = '$metragem'  and revestimentos = '$revestimento' and marcenaria = '$marcenaria' and descricaoAmbiente = '$desc_ambiente' and codCli = '$codCli' and codAmb = '$codAmb')");
    $sql_cadastra_projeto = mysqli_query($conexao, "INSERT INTO tbProjetos(formaContato, logradouro, bairro, estado, cidade, complemento, tipoImovel, tipoServico, metragem, revestimentos, marcenaria, descricaoAmbiente, codCli, codAmb) VALUES ('teste', '$logradouro', '$bairro', '$estado', '$cidade', '$complemento', '$tipo_imovel', '$tipo_servico', '$metragem', '$revestimento', '$marcenaria', '$desc_ambiente', '$codCli', '$codAmb');");

    echo "<br>";
    print_r($_POST);

    if (mysqli_affected_rows($conexao) > 0) {
        echo "<br>inserido";
    } else {
        echo "<br> não inserido";
    }
    $_SESSION['enviado'] = " enviado com sucesso";
    header('Location: ../index.php');
    // ! PENDENTE: Fazer o envio de email para empresa quando o formulário for enviado

} else {
    header('Location: ../formulario.html');
}