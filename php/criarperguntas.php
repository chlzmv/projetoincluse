<?php 
    session_start();
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
            
            <li style="float: right">
                <ul>
                    <li>
                        <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick = "clickProf()"></div>
                    <li>
                </ul>
            </li>
    </ul>
    </nav>

    <!-- botões menu hamburger   -->
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
    <section class="container">
            <div class="divTituloForm">
                <input type="text" id="tituloForm"  placeholder="Título" >
            </div>
            <hr>
            <div id = "section">
                <section class="divInfoForm">
                    <input type="text" id="numQuest" placeholder="N° Questão" >  
                    <input type="text" id="valorQuest" placeholder="Valor">
                </section>
                <section class="divCaixaTexto">
                    <textarea id="caixaTexto" cols="30" rows="20" placeholder="Insira o texto"></textarea>
                </section>
                <div id="table">
                    <input type="radio" name="select" placeholder="check1">

                    <textarea  id="areaText" cols="30" rows="1" placeholder="Insira o texto"></textarea> 
                    <span id="check" class="material-symbols-outlined">check</span>
                    <span id="add" class="material-symbols-outlined" onclick="adicionarCampo(this.parent)">add</span>   
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
                <input type="button" id="botaoSalva" name="btn-salvar" value="Salvar formulário">
            </footer>
            <?php
                
                if (isset($_POST['btn-salvar'])){
                    echo "Clicou";
                    //Conexão
                    require_once 'dbconexao.php'; 
                }
                else{
                    echo "n clicou";
                }
            ?>
    </section>
</body>
</html>
<!-- teste  -->