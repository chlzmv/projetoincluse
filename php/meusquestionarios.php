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
    <title>Meus Forms</title>
    <link rel="stylesheet" type="text/css" href="../css/stylemeusquestionarios.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../js/botoesmeusquestionarios.js"> </script>
    <script src="../js/botoestela.js"> </script>

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
        
        <li class="liLogin">
            <div class="nomeUser"><?php echo "Olá, " . $nomeUsuario; ?></div>     
            <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick = "clickProf()"></div>     
        </li>
    </nav>

    <!-- botões menu hamburger  -->
    <menu id="menu">
        <ul>
            <li><a href="criarperguntas.php?idUser=<?php echo $idUser; ?>">Criar Formulário</a></li>
            <li><a href="meusquestionarios.php?idUser=<?php echo $idUser; ?>">Meus Formulários</a></li>
            <li><a href="quemsomosusuario.php?idUser=<?php echo $idUser; ?>">Quem Somos?</a></li>
        </ul>   
    </menu>
    
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
     
    <!-- LISTA DE FORMULARIOS -->
    <header class="divTitulo">
        <h1>Meus formulários</h1>
    </header>
    <?php
        include("dbconexao.php");
        $idUser = $_SESSION['idUser'];
        $sql = "SELECT * FROM questionario WHERE idUser = '$idUser'";
        $resultado = mysqli_query($connect, $sql);

        if ($resultado) {
            while ($dado = mysqli_fetch_assoc($resultado)) {
                extract($dado);
                ?>
                <div class="divForms">
                    <span id="description" class="material-symbols-outlined">description</span>
                    <div class="divInfoForms">
                        <h2 id='<?php echo $idQuestn; ?>' onclick="location.href='questoesprontas.php?idQuestn=<?php echo $idQuestn; ?>'"><?php echo $dscTituloQuestn ?></h2><br>
                        <a>Criado em: <?php echo $datCriacQuestn ?></a>
                    </div>
                    <div class="divBotoes">
                        <span id="delete" class="material-symbols-outlined" onclick="location.href='apagarquestionario.php?idQuestn=<?php echo $idQuestn; ?>'">delete</span>
                        <input class="button" type="submit" value="Acessar Resultados" onclick="window.location='resultadosalunos.php';">
                    </div>
                </div>
                
                <?php
            }
        } else {
            echo "Erro na consulta: " . mysqli_error($resultado);
        }
    ?>

     <!-- Script botão menu -->

    <script>
        function clickMenu(){

            if (menu.style.display == "block") {
                menu.style.display = "none"
            } 
            else {menu.style.display = "block"}
    
        }
        function clickProf(){
            if (prof.style.display == "block") {
                prof.style.display = "none"
            } 
            else {prof.style.display = "block"}
        }

        function clickflut(){
            if (botFlut.style.display == "block") {
                botFlut.style.display = "none"
            } 
            else {botFlut.style.display = "block"}
        }
    </script>
    
</body>
</html>
