<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/styleredefsenha.css">
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
    <!--menu flutuante  -->
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
            <h1 >Redefina Senha </h1>
        </header>
        
        <form action="" method="post">
            <input class="input" type="email" id="email" name="email" placeholder="Email cadastrado">
            <input class="input" type="password" id="senha" name="senha" placeholder="Nova senha">
            <input class="input" type="password" id="csenha" name="csenha" placeholder="Confirmar senha">
            <input class="button" type="submit" value="confirmar" name="confirmar">
        </form>

        <p class="mensagem">
            <?php
                // Cria a conexão com o banco de dados
                include("dbconexao.php");

                // Verifica se a conexão foi estabelecida corretamente
                if ($connect->connect_error) {
                    die("Falha na conexão: " . $connect->connect_error);
                }

                // Dados para atualização
                $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
                $csenha = filter_input(INPUT_POST, 'csenha', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                
                // Query SQL para atualizar os dados
                if (isset($_POST['confirmar'])) {
                    $sql = "UPDATE usuario SET senhaUser = '$senha' WHERE dscEmailUser = '$email'";
                    
                    // verifica se as senhas são iguais
                    if($senha <> $csenha){
                        echo "Senhas não coincidem";

                    }else{
                        // Executa a query de atualização
                        if ($connect->query($sql) === TRUE) {
                            echo "Dados atualizados com sucesso.";
                        } else {
                            echo "Erro na atualização dos dados: " . $connect->error;
                        }
                    }
                }
            ?>
        </p> 
    </section>

</body>
</html>
