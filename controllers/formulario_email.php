<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function formata_string($string)
{
    return implode(" ", explode("*.", str_replace("_", " ", $string)));
}
function envia_email($nome, $email, $telefone, $total_ambientes, $forma_contato, $logradouro, $bairro, $estado, $cidade, $complemento, $tipo_imovel, $tipo_servico, $metragem, $revestimento, $marcenaria, $desc_ambiente, $imagem_ambiente)
{
    session_start();
    $ambientes = formata_string($total_ambientes);
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'smtpjhonatan@gmail.com';
        $mail->Password   = 'eakaathwuvtbszgd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
    
        //Recipients
        $mail->setFrom('smtpjhonatan@gmail.com', 'Intrê Arquitetura');
        $mail->addAddress("marquinhobs231@gmail.com");
        $name_list = [];
        $tmp_list = [];
        //Attachments
        foreach($imagem_ambiente['name'] as $name) {
            $name_list[] = $name;
        }
        foreach($imagem_ambiente['tmp_name'] as $tmp) {
            $tmp_list[] = $tmp;
        }

        for($i = 0; $i < count($name_list); $i++) {
            $mail->addAttachment($tmp_list[$i], $name_list[$i]);
        }
    
        //Content
        $mail->isHTML(true);       
        $mail -> CharSet = "UTF-8";
        $mail->Subject = 'INTRÊ arquitetura';
        $mail->Body    = "<h1>Formulario de solicitação de serviço</h1><br><br>";
        $mail->Body    .= "<h2>Nome do cliente: $nome</h2>";
        $mail->Body    .= "<h2>Email: $email</h2>";
        $mail->Body    .= "<h2>Telefone: $telefone</h2><br><br>";
        $mail->Body    .= "Tipo de serviço: $tipo_servico <br>";
        $mail->Body    .= "Tipo do imóvel: $tipo_imovel <br>";
        $mail->Body    .= "Tamanho: $metragem m² <br>";
        $mail->Body    .= "Endereço: $logradouro - $bairro, $cidade, $estado $complemento <br>";
        $mail->Body    .= "Ambientes: $ambientes <br>";
        $mail->Body    .= "Marcenaria: $marcenaria <br>";
        $mail->Body    .= "Revestimento: $revestimento<br>";
        $mail->Body    .= "Descrição do Ambiente: $desc_ambiente<br><br>";
    
        $mail->send();

        $_SESSION['mensagem'] = "Formulario enviado para";
        header('Location: ../index.php');
    } catch (Exception $e) {
        $_SESSION['mensagem'] = "Ocorreu um erro ao enviar a solicitação! Tente novamente. Erro: {$mail->ErrorInfo}";
        echo "Ocorreu um erro ao enviar a solicitação! Tente novamente. Erro: {$mail->ErrorInfo}";
        header('Location: ../formulario.html');
    }
}