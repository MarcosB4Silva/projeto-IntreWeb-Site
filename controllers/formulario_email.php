<?php
$para = "marquinhobs231@gmail.com";
$subject = "INTRÊ aquitetura";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$mensagem = "<html><head>";
$mensagem .= "<h3>Formulario de solicitação de serviço:</h3><br><br>";
$mensagem .= "Tipo de serviço: $tipo_servico: <br>";
$mensagem .= "Tipo do imóvel: $tipo_imovel";
$mensagem .= "Tamanho: $metragem m²";
$mensagem .= "Endereço <br>$logradouro - $bairro, $cidade, $estado, $complemento";
$mensagem .= "Ambientes: $total_ambientes";
$mensagem .= "</head></html>";

if (mail($para, $subject, $mensagem, $headers)) {
    $_SESSION['mensagem'] = "Formulario enviado para";
    header('Location: ../index.php');
} else {
    $_SESSION['mensagem'] = "Ocorreu um erro ao enviar a solicitação! Tente novamente.";
    header('Location: ../formulario.html');
}
