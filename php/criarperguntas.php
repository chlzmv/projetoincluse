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

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Criar Forms</title>
     <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css"  href="../css/stylecriarpergunta.css" /> 
     <script src="../js/botoestela.js" defer> </script>
    <script src="../js/botoescriarquestao.js" defer></script>
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
                <div class="nomeUser"><?php echo "Olá, " . $nomeUsuario; ?></div>
                <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick = "clickProf()"></div>
             </li>
    </ul>
    </nav>

    <!-- botões menu hamburger   -->
    <menu id="menu">
        <ul>
            <li><a href="criarperguntas.php">Criar Formulário</a></li>
            <li><a href="meusquestionarios.php">Meus Formulários</a></li>
            <li><a href="quemsomos.php">Quem Somos?</a></li>
        </ul>   
    </menu>
    
    <!-- botões menu profile -->
    <menu class="menuProf" id="prof">
        <ul class="ulProf">
            <li class="liProf"><a href="login.html" class="aProf">Trocar usuário</a></li>
            <li class="liProf"><a href="#" class="aProf">Sair</a></li>
        </ul>   
    </menu>

    <!--menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add1">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>

    <!-- ///////////////////////// -->

    <!-- conteudo pagina -->
    <h1>Criar formulário</h1>
    <form class="container" action="acaocriarperguntas.php" method="post">
            <div class="divTituloForm">
                <input type="text" id="tituloForm" name="tituloForm"  placeholder="Título" >
                <input type="text" name="valorTotQuestn" id="valorTotQuestn" placeholder="Valor total">

            </div>
            <hr>
            <div id = "section">
                <section class="divInfoForm">
                    <input type="text" name="numQuest" id="numQuest" placeholder="N° Questão" >  
                    <input type="text" name="valorQuest" id="valorQuest" placeholder="Valor">
                </section>
                <section class="divCaixaTexto">
                    <textarea id="caixaTexto" name="caixaTexto"  cols="30" rows="20" placeholder="Insira o texto"></textarea>
                </section>
                <div id="campo" >
                    <input type="radio" id="select"  name="select" >
                    <textarea  id="checkText" name="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea> 
                    <span id="check" name="check"class="material-symbols-outlined">check</span>
                    <span id="add" class="material-symbols-outlined" onclick="adicionarCampo(this.parentElement.parentElement)">add</span>   
                </div>
                
                
            </div>
            <hr>
            <footer class="divBotoesInfer">
                <table>
                    <tr>
                        <td>
                            <span id="add_box" class="material-symbols-outlined" onclick="adicionarQuestao()">add_box</span>
                        </td>
                        <td>
                            <span id="delete_box" class="material-symbols-outlined" onclick="removerQuestao()">delete</span>
                        </td>
                        
                    </tr>
                </table>
                <input type="submit" id="botaoSalva" name="btn-salvar" value="Salvar formulário">
            </footer>
</form>
</body>
</html>
<!-- teste  -->