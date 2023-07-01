<?php
    session_start();
    require 'dbconexao.php';
   
    $idUser = $_SESSION['idUser'];

    $sql = "SELECT * FROM usuario WHERE idUser = '$idUser'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_assoc($resultado);
        $nomeUsuario = $dados['nomUser']; // Obter o nome do usuário a partir dos dados do banco de dados
    } else {
        // Trate o caso em que os dados do usuário não são encontrados
        $nomeUsuario = "Usuário Desconhecido";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Incluse</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/styleareadousuario.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- codigo do menu  -->
    <nav class="divMenu">
        <ul>
            <li style="float: left">
                <nav class="containerIconMenu">
                    <span class="material-symbols-outlined" onclick="clickMenu()" id="dropdown">menu</span>
                </nav>
            </li>    
            <li><a href="index.php" class="aplicafontelogo">Incluse.com</a></li>
            
        
            
            <li class="liLogin">
                <div class="nomeUser"><?php echo "Olá, " . $nomeUsuario; ?></div>
                <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick = "clickProf()"></div>
            </li>
        </ul>
    </nav>

    <!-- botões menu hamburger -->
    <menu id="menu">
        <ul>
            <li><a href="criarperguntas.php?idUser=<?php echo $idUser; ?>">Criar Formulário</a></li>
            <li><a href="meusquestionarios.php?idUser=<?php echo $idUser; ?>">Meus Formulários</a></li>
            <li><a href="quemsomos.php?idUser=<?php echo $idUser; ?>">Quem Somos?</a></li>
        </ul>   
    </menu>

    <!-- menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>

    <!-- botões menu profile -->
    <menu class="menuProf" id="prof">
        <ul class="ulProf">
            <li class="liProf"><a href="login.php" class="aProf">Trocar usuário</a></li>
            <li class="liProf"><a href="../php/logout.php" class="aProf">Sair</a></li>
        </ul>   
    </menu>


    <!-- Conteudo pag -->

    <section class="container">
        <header class="divWelc">
            <h1>Bem-vindo a Incluse</h1>
            <a>A sua plataforma de formulários acessíveis...</a>
        </header>
        <nav class="BotC" onclick="window.location='criarperguntas.php?idUser=<?php echo $idUser; ?>';">
            <h2>Criar formulários</h2>
            <span class="material-symbols-outlined" id="pencil">edit</span>
        </nav>
        <section class="divLowBot">
            <nav class="botMP" onclick="window.location='meusquestionarios.php?idUser=<?php echo $idUser; ?>';">
                <h2>Meus forms</h2>
                <span class="material-symbols-outlined" id="book">menu_book</span>
            </nav>
            <nav class="botCI" onclick="window.location='quemsomos.php?idUser=<?php echo $idUser; ?>';">
                <h2>Quem somos</h2>
                <span class="material-symbols-outlined" id="info">info</span>
            </nav>
        </section>
    </section>
    
</body>
</html>
