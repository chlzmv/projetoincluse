<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Incluse</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/styleindex.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- codigo do menu -->
    <nav class="divMenu">
        <ul>
            <li style="float: left">
                <nav class="containerIconMenu">
                    <span class="material-symbols-outlined" onclick="clickMenu()" id="dropdown">menu</span>
                </nav>
            </li>    
            <li><a href="index.php" class="aplicafontelogo">Incluse.com</a></li>
            
        
            
            <li class="liLogin">
                <ul>
                    <li><input type="button" id="botaoCad" value="Cadastre-se" onclick="window.location='cadastro.php';"></li>
                    <li><a href="login.php">Entrar</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- botões menu hamburger -->
    <menu id="menu">
        <ul>
            <li><a href="criarperguntas.php">Criar Formulário</a></li>
            <li><a href="meusformularios.php">Meus Formulários</a></li>
            <li><a href="quemsomos.php">Quem Somos?</a></li>
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


    <!-- Conteudo pag -->

    <section class="container">
        <header class="divWelc">
            <h1>Bem-vindo a Incluse</h1>
            <a>A sua plataforma de formulários acessiveis...</a>
        </header>
        <nav class="BotC" onclick="window.location='criarperguntas.php';">
            <h2>Criar formulários</h2>
            <span class="material-symbols-outlined" id="pencil">edit</span>
        </nav>
        <section class="divLowBot">
            <nav class="botMP" onclick="window.location='meusformularios.php';">
                <h2>Meus forms</h2>
                <span class="material-symbols-outlined" id="book">menu_book</span>
            </nav>
            <nav class="botCI" onclick="window.location='quemsomos.php';">
                <h2>Quem somos</h2>
                <span class="material-symbols-outlined" id="info">info</span>
            </nav>
        </section>
    </section>
    
</body>
</html>