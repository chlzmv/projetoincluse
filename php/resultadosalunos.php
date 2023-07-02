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
    <title>Resultado Forms</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/styleresultadosalunos.css">
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

    <!-- menu flutuante -->
    <div class="menuFlut">
        <div class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </div>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </div>

    <!-- CONTEUDO PAGINA -->
    <div class="containerConteudo">
    

        <!-- infos add forms -->
        <div class="containerInfoForms bottom">
            <!-- titulo pag -->
            <h1>Título do Formulário</h1>
            <div class="divInfoForms">
                <a>Criado em:</a>
                <a>xx/xx/xxxx</a>
                <a class="espace"></a>
                <a>Concluídos:</a>
                <a>xx/xx</a>
            </div>
        </div>

        <!-- lista de alunos -->
        
        <div class="divResult">
            <div class="divInfoAluno" >
                <span id="school" class="material-symbols-outlined">school</span>       
                <h2>Nome Aluno santos</h2>
                <div class="emailAcertos">
                    <div >
                        <a>Email:</a>
                        <a>nomesobrenome@email.com</a>
                    </div>
                    <div >
                        <a>Acertos:</a>
                        <a>xx/xx</a>
                    </div>
                </div> 
                <div class="porcent">
                    <a>00%</a>
                </div>
            </div>
        </div>
        
    </div>
    

</body>
</html>