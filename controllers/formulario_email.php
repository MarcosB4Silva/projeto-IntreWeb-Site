<?php
function formata_string($string)
{
    $string = implode(", ", explode(" ", $string));
    return implode(" ", explode("*", str_replace("_", " ", $string)));
}
function envia_email($nome, $email, $telefone, $total_ambientes, $forma_contato, $logradouro, $bairro, $estado, $cidade, $complemento, $tipo_imovel, $tipo_servico, $metragem, $revestimento, $marcenaria, $desc_ambiente, $imagem_ambiente)
{
    $ambientes = formata_string($total_ambientes);
    $formata_marcenaria = formata_string($marcenaria);
    $formata_revestimento = formata_string($revestimento);


    $destinatario = "marquinhobs231@gmail.com";
    $subject = "INTRÊ arquitetura";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: INTRÊ arquitetura";
    $mensagem = "<html><head>";
    $mensagem .= "<h1>Formulario de solicitação de serviço</h1><br><br>";
    $mensagem .= "<h2>Nome do cliente: $nome</h2>";
    $mensagem .= "<h2>Email: $email</h2>";
    $mensagem .= "<h2>Telefone: $telefone</h2><br><br>";
    $mensagem .= "Tipo de serviço: $tipo_servico <br>";
    $mensagem .= "Tipo do imóvel: $tipo_imovel <br>";
    $mensagem .= "Tamanho: $metragem m² <br>";
    $mensagem .= "Endereço: $logradouro - $bairro, $cidade, $estado $complemento <br>";
    $mensagem .= "Ambientes: $ambientes <br>";
    $mensagem .= "Macenaria: $formata_marcenaria <br>";
    $mensagem .= "Revestimento: $formata_revestimento<br>";
    $mensagem .= "Descrição ambiente: $desc_ambiente<br><br>";
    $mensagem .= "Imagens: [ERRO:$imagem_ambiente] Não foi possivel carregar a imagem <br>";
    $mensagem .= "</head></html>";

    if (mail($destinatario, $subject, $mensagem, $headers)) {
        $_SESSION['mensagem'] = "Formulario enviado para";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Ocorreu um erro ao enviar a solicitação! Tente novamente.";
        // header('Location: ../formulario.html');
    }
}