

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
    <script src="../js/botoesquestoesprontas.js"></script>
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
                

                // Parte 1: Resgatando as informações do questionário
                $sql = "SELECT dscTituloQuestn, datCriacQuestn FROM questionario WHERE idQuestn = $idQuestn";
                $resultado = mysqli_query($connect, $sql);

                if ($resultado) {
                    $dadosQuestionario = mysqli_fetch_assoc($resultado);
                    $dscTituloQuestn = $dadosQuestionario['dscTituloQuestn'];
                    $datCriacQuestn = $dadosQuestionario['datCriacQuestn'];

                    // Exibir o bloco de informações do questionário apenas uma vez
                    echo "<h1>$dscTituloQuestn</h1>";
                    echo "<div class='divInfoForms'>";
                    echo "<a>Criado em: $datCriacQuestn</a>";
                    echo "<a class='espace'></a>";
                    echo "<a>Concluídos:</a>";
                    echo "</div>";
                }

                // Parte 2: Criando blocos de informações das questões e suas respostas
                
                $sql = "SELECT * FROM questoes WHERE idQuestn = $idQuestn";
                $resultado = mysqli_query($connect, $sql);
                if ($resultado) {
                    while ($dadosQuestao = mysqli_fetch_assoc($resultado)) {
                        $idQuest = $dadosQuestao['idQuest'];
                        $dscEnuncQuest = $dadosQuestao['dscEnuncQuest'];
                        $numQuest = $dadosQuestao['numQuest'];
                        $valUnitQuest = $dadosQuestao['valUnitQuest'];

                        echo "<section class='divQuest'>";
                        echo "<div class='divValor'>";
                        echo "<a style='float: left;'>$numQuest</a>";
                        echo "<a style='float: right;'>$valUnitQuest</a>";
                        echo "</div>";
                        echo "<div>";
                        echo "<a>$dscEnuncQuest</a>";
                        echo "</div>";

                         $sqlRespostas = "SELECT * FROM item WHERE idQuest = $idQuest";
                         $resultadoRespostas = mysqli_query($connect, $sqlRespostas);
                         if ($resultadoRespostas) {
                             while ($dadosResposta = mysqli_fetch_assoc($resultadoRespostas)) {
                                 $dscEnuncItem = $dadosResposta['dscEnuncItem'];

                                 echo "<form class='divResp'>";
                                 echo "<input type='radio' name='resp'>";
                                 echo "<label>$dscEnuncItem</label>";
                                 echo "</form>";
                             }
                         } else {
                             echo "Erro na consulta: " . mysqli_error($connect);
                         }

                         
                        echo "</section>";
                    }    
                } 
                else {
                    echo "Erro na consulta: " . mysqli_error($connect);
                }
                ?>
            
        </header>
        <hr>
        <footer class="divBotoesInfer">
            <span id="link" class="material-symbols-outlined" onclick="copiarTexto(<?php echo $idQuestn; ?>)">link</span>
            <input id="button" type="submit" value="Acessar Resultados" onclick="window.location='resultadosalunos.html';">
            
        </footer>

    </section>

    
</body>
</html>