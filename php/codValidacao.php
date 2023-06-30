<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/stylecodvalidacao.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../js/botoestela.js"> </script>
</head>
<body >
    
    <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li href="#" class="close" onclick="window.location='index.php';"></li>
        </ul>
    </header>
    <!--menu flutuante   -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add1">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>  

    <section class="container">
        <header class="divH1">
            <h1 >Redefina Senha</h1>
        </header>
        
        <form action='' method='post'>
            <p>Insira abaixo o código enviado ao email disponibilizado anteriormente.</p>
            <input class="input" type="password" id="cod" name="cod" placeholder="Código de validação">
            <input class="button" type="submit" value="Confirmar" name="confirmar">
        </form>
        <?php
            if (isset($_POST['confirmar'])) {
                // Conexão
                require('dbconexao.php');
            
                $cod = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            
                $sql = "SELECT * FROM redsenha WHERE codRedSenha = '$cod'";
                $result = $connect->query($sql);
            
                if ($result->num_rows > 0) {
                    header("Location: redefSenha.php");
                    exit();
                } else {
                    echo "Código inválido!";
                }
            }
        ?>        
    </section>
    
</body>
</html>
