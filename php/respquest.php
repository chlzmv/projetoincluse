<?php
    session_start();
    require 'dbconexao.php';
    
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    } else {
        header('Location: loginresp.php');
        exit();
    }
    $idUser = $_SESSION['idUser'];
    $sql = "SELECT * FROM usuario WHERE idUser = '$idUser'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_assoc($resultado);
        $nomeUsuario = $dados['nomUser']; 
    } else {
       
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
    <title>Forms</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/stylerespquest.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- codigo do menu -->
    <nav class="divMenu"><ul>
          
        <li><a href="index.php" class="aplicafontelogo">Incluse.com</a></li>
        
        <li class="liLogin">
            <div class="nomeUser"><?php echo "Olá, " . $nomeUsuario; ?></div>
            <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick = "clickProf()"></div>
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

    <!-- codigo do conteudo -->
    <section class="divConteudo">
    
    <header class="containerInfoForms bottom">
            <!-- titulo pag -->
            <?php
                include("dbconexao.php");


                $idQuestn = filter_input(INPUT_GET, "idQuestn");
                echo $idQuestn;
                $sql = "SELECT idUser FROM questionario WHERE idQuestn = '$idQuestn'";
                $result = mysqli_query($connect, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $idUser = $row['idUser'];
                }

                // Parte 1: Resgatando as informações do questionário
                $sql = "SELECT dscTituloQuestn FROM questionario  WHERE idQuestn = '$idQuestn' AND idUser = '$idUser'";
                $resultado = mysqli_query($connect, $sql);

                if ($resultado) {
                    $dadosQuestionario = mysqli_fetch_assoc($resultado);
                    $dscTituloQuestn = $dadosQuestionario['dscTituloQuestn'];
                   
                    // Exibir o bloco de informações do questionário apenas uma vez
                    echo "<h1>$dscTituloQuestn</h1>";
                    echo "<div class='divInfoForms'>";
                    echo "<a class='espace'></a>";
                    echo "</div>";
                }

                
                

                // Parte 2: Criando blocos de informações das questões e suas respostas
                
                $sql = "SELECT * FROM questoes qst JOIN questionario qstn on qst.idQuestn = qstn.idQuestn WHERE qst.idQuestn = $idQuestn AND qstn.idUser = '$idUser' ";
                $resultado = mysqli_query($connect, $sql);
                if ($resultado) {
                    while ($dadosQuestao = mysqli_fetch_assoc($resultado)) {
                        $idQuest = $dadosQuestao['idQuest'];
                        $dscEnuncQuest = $dadosQuestao['dscEnuncQuest'];
                        $numQuest = $dadosQuestao['numQuest'];
                        $valUnitQuest = $dadosQuestao['valUnitQuest'];
                        $contQuest = 1;
                        $countResp = 1;

                        echo "<section class='divQuest'>";
                        echo "<div class='divValor'>";
                        echo "<a class='numQuest' style='float: left;'>Questão $numQuest</a>";
                        echo "<a style='float: right;'>$valUnitQuest</a>";
                        echo "</div>";
                        echo "<div>";
                        echo "<a class='dscQuest'>$dscEnuncQuest</a>";
                        echo "</div>";

                        $sqlRespostas = "SELECT * FROM item WHERE idQuest = $idQuest";
                        $resultadoRespostas = mysqli_query($connect, $sqlRespostas);
                        if ($resultadoRespostas) {

                            echo "<form class='divResp'>";
                                while ($dadosResposta = mysqli_fetch_assoc($resultadoRespostas)) {
                                    $dscEnuncItem = $dadosResposta['dscEnuncItem'];

                                    echo "<input type='radio' name='resp" . $countResp . "' value='" . $dscEnuncItem . "'>";
                                    echo "<label>$dscEnuncItem</label><br><br>";
                                    
                                }
                            echo "</form>";
                        
                        $countResp++;
        
                        } else {
                            echo "Erro na consulta: " . mysqli_error($connect);
                        }

                         
                        echo "</section>";
                        $contQuest++;
                    }    
                } 
                else {
                    echo "Erro na consulta: " . mysqli_error($connect);
                }
                ?>
            
        </header>
    
    </section>

</body>
</html>