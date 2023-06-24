

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Forms</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/stylequestoesprontas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- codigo do menu  -->
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
                    <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick = "clickProf()"></div>
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




<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
    



<!-- codigo do conteudo -->
    <section class="divConteudo">

        <!-- Cabeçalho -->
        <header class="containerInfoForms bottom">
            <!-- titulo pag -->
            <?php
                include("dbconexao.php");

                $idQuestn = filter_input(INPUT_GET, "idQuestn");
                var_dump($idQuestn);

                $sql1 = "SELECT * FROM questionario INNER JOIN questoes ON questionario.idQuestn = questoes.questionario_idQuestn INNER JOIN item ON questoes.idQuest=item.questoes_idQuest ";
                $sql2 = "SELECT * FROM questionario WHERE idQuestn = $idQuestn";
 
                $resultado1 = mysqli_query($connect, $sql1);
                $resultado2 = mysqli_query($connect, $sql2);

                if ($resultado1 && $resultado2) {
                    $dado1 = mysqli_fetch_assoc($resultado1);
                    $dado2 = mysqli_fetch_assoc($resultado2);
            
                    if ($dado1 && $dado2) {
                        extract($dado1);
                        extract($dado2);?>
                        <h1><?php echo $dscTituloQuestn ?></h1>
                        <div class="divInfoForms">
                            <a>Criado em: <?php echo $datCriacQuestn ?></a>
                            <a class="espace"></a>
                            <a>Concluídos:</a>
                        </div>
                        <section class="divQuest">
                            <div class="divValor">
                                <a style="float: left;"><?php $numQuest ?></a>
                                <a style="float: right;"><?php $valUnitQuest ?></a>
                            </div>
                            <div>
                                <a><?php $dscEnuncQuest ?></a>
                            </div>
                            <form class="divResp">
                                <input type="radio" name="resp">
                                <label><?php echo $dscEnuncItem ?></label> 
                            </form>
                        </section>
            <?php
                    }else {
                        echo "Nenhum dado encontrado.";
                    }
                } else {
                    echo "Erro na consulta: " . mysqli_error($connect);
                }
            ?>

            
        </header>
        <hr>
        <footer class="divBotoesInfer">
            <span id="delete" class="material-symbols-outlined">
                delete
            </span>
            <input id="button" type="submit" value="Acessar Resultados" onclick="window.location='resultadosalunos.html';">
            
        </footer>

    </section>

    
</body>
</html>