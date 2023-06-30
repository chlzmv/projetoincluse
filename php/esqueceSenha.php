<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="../css/styleesquecesenha.css">
</head>
<body >
   
    <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li class="close" onclick="window.location='login.php';"></li>
        </ul>
    </header>

    <section class="container">
        <h1 class="divH1">Redefina sua senha</h1>
        <p>Se a conta existir,  enviaremos um e-mail com instruções para redefinir a senha.</p>
        <form action="" method="post">
            <input class="input" type="email" id="email" name="email"placeholder="Email">
            <input class="button" type="submit" value="redefinir" name="redefinir">
        </form>
    </section>
    
    <?php

        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

        // Função para gerar código aleatório
        function gerarCodigo($tamanho) {
            $codigo = '';
            $caracteres = '0123456789';

            for ($i = 0; $i < $tamanho; $i++) {
                $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }

            return $codigo;
            }

        // Definir tamanho do código
        $codigoAleatorio = gerarCodigo(4);
        echo $codigoAleatorio;
    
        require_once "../mailer/SMTP.php"; 
        require_once "../mailer/PHPMailer.php"; 
        require_once "../mailer/Exception.php"; 

        // Configurações do servidor SMTP do Gmail
        $smtpHost = 'smtp.gmail.com';
        $smtpPort = 587;
        $smtpUsername = 'Inclusecorp@gmail.com';
        $smtpPassword = 'Incluse123456';

        // Configurações de e-mail
        $fromEmail = 'Inclusecorp@gmail.com';
        $toEmail = $email;
        $subject = 'Código redefinição de senha';
        $message = 'Utilize o código a seguir para redefinir sua senha: ' . $codigoAleatorio;

        // Cria uma nova instância do PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->Port = $smtpPort;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;

        // Configurações do e-mail
        $mail->setFrom($fromEmail);
        $mail->addAddress($toEmail);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Envia o e-mail
        if ($mail->send()) {
            echo 'E-mail enviado com sucesso.';
        } else {
            echo 'Falha ao enviar o e-mail.';
        }
    ?>

</body>
</html>