<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Forms</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/resultadoquestionario.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- codigo do menu -->
    <nav class="divMenu">
        <ul>
            <li><a href="index.php" class="aplicafontelogo">Incluse.com</a></li>
            <li class="liLogin">
                <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick="clickProf()"></div>
            </li>
    </nav>

    <!-- botões menu profile -->
    <menu class="menuProf" id="prof">
        <ul class="ulProf">
            <li class="liProf"><a href="login.php" class="aProf">Trocar usuário</a></li>
            <li class="liProf"><a href="../php/logout.php" class="aProf">Sair</a></li>
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
    <?php
                include("dbconexao.php");

                $idQuestn = filter_input(INPUT_GET, "idQuestn");
                $idUser = filter_input(INPUT_GET, "idUserLog");

                $sql = "SELECT questn.valTotQuestn, usuquest.valNotUser 
                        FROM questionario questn JOIN usuarioquestn usuquest 
                        ON (questn.idQuestn = usuquest.idQuestn) 
                        WHERE usuquest.idUser = $idUser";
                $resultado = mysqli_query($connect, $sql);
                $notQuest = mysqli_fetch_assoc($resultado);
                $notUser = $notQuest['valNotUser'];
                $notTotQuestn = $notQuest['valTotQuestn'];

                // <!-- codigo do conteudo -->
                echo "<section class='divConteudo'>";
                echo    "<section class='divForms'>";
                echo        "<h1>Resultado</h1> <br>";
                echo        "<a class='notaMaior'>$notUser</a><br>";
                echo        "<a>$notUser / </a>";
                echo        "<a>$notTotQuestn</a><br><br>";
                echo        "<a class='pagPrinc' href='index.php'>Pagina principal</a><br><br>";
                echo     "</section> <br>";
                echo "</section>";
                
    ?>
    
</body>

</html>