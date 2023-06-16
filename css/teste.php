<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="botoestela.js"> </script>
</head>
<body >
    <?php
    

    if(isset($_POST['btn-entrar'])){
        session_start();
    
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);            
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); 
        $senha = md5($senha); // Recomenda-se usar algoritmos mais seguros, como bcrypt
    
        // Conexão com o banco de dados (exemplo usando MySQLi)
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "projetoincluse";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
        
        $email = $conn->real_escape_string($email); // Escape de caracteres especiais
        $senha = $conn->real_escape_string($senha); // Escape de caracteres especiais
    
        $sql = "SELECT * FROM usuario WHERE dscEmailUser = '$email' && senhaUser = '$senha' LIMIT 1";
        $resultado = $conn->query($sql);
    
        if ($resultado && $resultado->num_rows > 0) {
            // Autenticação bem-sucedida
            header("Location: administrativo.php");
            exit();
        } else {
            // Autenticação falhou
            echo "Usuário ou senha inválido";
            header("Location: login.php");
            exit();
        }
    
        $conn->close();
    } else {
        // Nenhum formulário enviado
    }

    ?>
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
        </form>
    </section>
    
</body>
</html>