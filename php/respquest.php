<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Forms</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/stylerespquest.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- codigo do menu -->
    <nav class="divMenu"><ul>
        <li style="float: left">
            <nav class="containerIconMenu">
                <span class="material-symbols-outlined" onclick="clickMenu()" id="dropdown">menu</span>
            </nav>
        </li>    
        <li><a href="index.php" class="aplicafontelogo">Incluse.com</a></li>
        
        <li style="float: right">
            <ul>
                <li>
                    <div class="backgroundImagem"><img src="iconUser.png" class="configimagem" onclick = "clickProf()"></div>
                <li>
            </ul>
        </li>
    </nav>

    <!-- botões menu hamburger -->
    <menu id="menu">
        <ul>
            <li><a href="criarperguntas.php">Criar Formulário</a></li>
            <li><a href="meusformularios.php">Meus Formulários</a></li>
            <li><a href="quemsomos.php">Quem Somos?</a></li>
        </ul>   
    </menu>

    <!-- botões menu profile -->
    <menu class="menuProf" id="prof">
        <ul class="ulProf">
            <li class="liProf"><a href="login.php" class="aProf">Trocar usuário</a></li>
            <li class="liProf"><a href="#" class="aProf">Sair</a></li>
        </ul>   
    </menu>

    <!--menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>

    <!-- codigo do conteudo -->
    <section class="divConteudo">
    <?php
    include
        // Cabeçalho 
        echo "<div class='infoQuestn'>"
        echo "<h1>Titulo Questionario</h1>"
        echo "</div>"
        
        // Questão 
        echo "<section class='divQuest'>"
            <div class="divValor">
                <a style="float: left;">Questão 1</a>
                <a style="float: right;">2,0</a>
            </div>
            <div>
                <a>Para realizar a construção de um projeto de banco de dados de forma correta deve-se passar por necessariamente três fases. Dentre as afirmativas a seguir, escolha a que compreende a alternativa correta.</a>
            </div>
            <form class="divResp">
                <input type="checkbox" id="checkbox" name="Resposta1" value="Troiani">
                <label for="Resposta1"> Entidade, relacionamento e atributo</label><br>
                <input type="checkbox" id="checkbox" name="Resposta2" value="Serpentus">
                <label for="Resposta2">Modelo conceitual, projeto lógico e projeto físico.</label><br>
                <input type="checkbox" id="checkbox" name="Resposta3" value="Equum">
                <label for="vehicle3"> Um-para-um, um-para-muitos e muitos-para-muitos.</label><br><br>
            </form>
        </section> 
    ?>
    </section>

    
</body>
</html>