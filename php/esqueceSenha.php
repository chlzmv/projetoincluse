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
    <?php
        include("dbconexao.php")

        if(isset($_POST[redefinir]))
    ?>
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
    
</body>
</html>