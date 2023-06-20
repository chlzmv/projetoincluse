<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Login</title>
    <link rel="stylesheet" href="../css/stylelogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../js/botoestela.js"> </script>
</head>
<body >
       <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li onclick="window.location='index.php';" class="close"></li>
        </ul>
    </header>
    <!--menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add1">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>  

    <section class="container">
        <h1 class="divH1">Entrar</h1>
        <!-- <hr class="hr" > -->
        <form action="login.php" method="post">
            <input class="input" type="email" id="email" name="email"placeholder="Email">
            <input class="input" type="password" id="senha" name="senha" placeholder="Senha">
            <nav class="divA">
                <a href="esqueceSenha.php">Esqueceu a senha?</a>
            </nav>
            <input class="button" type="submit" name="btn-entrar" value="Confirmar">

            <?php
    

        session_start(); 
        
        if (isset($_POST['btn-entrar'])){
        
            echo "Clicou";
            //Conexão
            require_once 'dbconexao.php';

            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);            
            $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING); 
            // $senha = md5($senha);       
            
            $sql = "SELECT * FROM usuario WHERE dscEmailUser = '$email' AND senhaUser = '$senha' " ;
            $resultado = mysqli_query($connect, $sql);
            // echo $sql;

            if (mysqli_num_rows($resultado) > 0){
                //  echo "usuario encontrado.";
                header("Location: administrativo.php");         
            } else{
                echo "Usuário ou senha inválido!";
                
            } 
            }
        ?>
        </form>
    </section>
    
</body>
</html>