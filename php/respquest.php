<?php
session_start();
require 'dbconexao.php';

if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] === true) {
    header('Location: loginresp.php');
    exit();
}

$idUser = $_SESSION['idUser'];
$sql = "SELECT * FROM usuario WHERE idUser=$idUser";
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
    <script src="../js/botoestela.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/stylerespquest.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- codigo do menu  -->
    <nav class="divMenu">
        <ul>
            <li>
                <a href="index.php" class="aplicafontelogo">Incluse.com</a>
            </li>
            <li class="liLogin">
                <div class="nomeUser"><?php echo "Olá, " . $nomeUsuario; ?></div>
                <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick="clickProf()"></div>
            </li>
        </ul>
    </nav>

    <!-- botões menu profile -->
    <menu class="menuProf" id="prof">
        <ul class="ulProf">
            <li class="liProf"><a href="login.php" class="aProf">Trocar usuário</a></li>
            <li class="liProf"><a href="../php/logout.php" class="aProf">Sair</a></li>
        </ul>
    </menu>

    <!--menu flutuante -->
    <menu class="menuFlut">
        <div class="botMenuFlut" id="botFlut">
            <span class="material-symbols-outlined" id="add">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </div>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </menu>

    <!-- codigo do conteudo -->
    <section class="divConteudo">
        <form action="" method='post'>
            <div class="containerInfoForms bottom">
                <!-- titulo pag -->
                <?php
                include("dbconexao.php");

                $idQuestn = filter_input(INPUT_GET, "idQuestn");
                $sql = "SELECT idUser FROM questionario WHERE idQuestn=$idQuestn";
                $result = mysqli_query($connect, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $idUser = $row['idUser'];
                }

                // Parte 1: Resgatando as informações do questionário
                $sql = "SELECT dscTituloQuestn FROM questionario  WHERE idQuestn=$idQuestn AND idUser=$idUser";
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

                $contQuest = 0;
                $countResp = 1;
                $arrayC = array();

                // Parte 2: Criando blocos de informações das questões e suas respostas
                $sql = "SELECT * FROM questoes qst JOIN questionario qstn on qst.idQuestn=qstn.idQuestn WHERE qst.idQuestn=$idQuestn AND qstn.idUser=$idUser";
                $resultado = mysqli_query($connect, $sql);
                if ($resultado) {
                    while ($dadosQuestao = mysqli_fetch_assoc($resultado)) {
                        $idQuest = $dadosQuestao['idQuest'];
                        $dscEnuncQuest = $dadosQuestao['dscEnuncQuest'];
                        $numQuest = $dadosQuestao['numQuest'];
                        $valUnitQuest = $dadosQuestao['valUnitQuest'];
                        $contQuest++;

                        echo "<section class='divQuest'>";
                        echo "<div class='divValor'>";
                        echo "<a class='numQuest' style='float: left;'>Questão $numQuest</a>";
                        echo "<a style='float: right;'>$valUnitQuest</a>";
                        echo "</div>";
                        echo "<div>";
                        echo "<a class='dscQuest'>$dscEnuncQuest</a>";
                        echo "</div>";

                        $sqlRespostas = "SELECT * FROM item WHERE idQuest=$idQuest";
                        $resultadoRespostas = mysqli_query($connect, $sqlRespostas);
                        if ($resultadoRespostas) {
                            $name = 'resp' . $countResp;
                            echo "<div class='divResp'>";
                            while ($dadosResposta = mysqli_fetch_assoc($resultadoRespostas)) {
                                $dscEnuncItem = $dadosResposta['dscEnuncItem'];
                                $idItem = $dadosResposta['idItem'];

                                echo "<input type='radio' name='$name' value='$idItem'>";
                                echo "<label>$dscEnuncItem</label><br><br>";
                            }
                            echo "</div>";
                            $countResp++;
                        } else {
                            echo "Erro na consulta: " . mysqli_error($connect);
                        }

                        echo "</section>";

                        $sql = "SELECT idItem FROM item WHERE indItemCorreto='S' AND idQuest = $idQuest";
                        $resultado1 = mysqli_query($connect, $sql);
                        $respC = mysqli_fetch_assoc($resultado1);
                        $idItemC = $respC['idItem'];
                        array_push($arrayC, $idItemC);
                    }
                } else {
                    echo "Erro na consulta: " . mysqli_error($connect);
                }
                if (isset($_POST['btn-enviar'])) {
                    $countResp2 = 0;
                    $contNota = 0;
                    $i = 0;

                    while ($i < $contQuest) {
                        $countResp2++;
                        $name2 = 'resp' . $countResp2;
                        $respostaSelecionada = $_POST[$name2];


                        foreach ($arrayC as $value) {
                            $sql = "SELECT idQuest FROM item WHERE idItem = $value";
                            $resultado2 = mysqli_query($connect, $sql);
                            $idQuestV = mysqli_fetch_assoc($resultado2);
                            $questaoC = $idQuestV['idQuest'];

                            if ($value == $respostaSelecionada) {
                                $sql = "SELECT valUnitQuest FROM questoes WHERE idQuest = $questaoC";
                                $resultado3 = mysqli_query($connect, $sql);
                                $totQuest = mysqli_fetch_assoc($resultado3);
                                $valQuest = $totQuest['valUnitQuest'];

                                $contNota = $contNota + $valQuest;
                            } else {
                                $contNota = $contNota + 0;
                            }
                        }
                        $i++;
                    }
                    $sql = "INSERT INTO usuarioquestn(datRespQuestn,valNotUser,idQuestn,idUser) VALUES (CURRENT_DATE(), $contNota, $idQuestn, $idUser)";
                    mysqli_query($connect, $sql);
                }
                ?>
            </div>

            <footer class="footer">
                <input type="submit" class="botaoSalva" name="btn-enviar" value="Enviar formulário">
            </footer>
        </form>
    </section>

</body>

</html>