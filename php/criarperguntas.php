<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="icon.png" type="image/png">
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

    <!-- botões menu hamburger  -->
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
        <section class="divInfoForm">
            <input type="text" id="numQuest" placeholder="N° Questão" >
            <div class="inputSV">
                <select id="formSelect">
                    <option selected disabled>Tipo da Questão:</option>
                    <option value="1">Resposta Única</option>
                    <option value="2">Múltipla Escolha</option>
                </select>
                <input type="text" id="valorQuest" placeholder="Valor">
            </div>
        </section>
        <section class="divCaixaTexto">
            <textarea id="caixaTexto" cols="30" rows="20" placeholder="Insira o texto"></textarea>
        </section>
        
        <!-- <section class="divCheckBox">
            <div class="opcao">
                <input type="checkbox" id="checkbox1" placeholder="check1">
                <textarea  id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea>
                <span id="delete" class="material-symbols-outlined" >
                    delete
                </span>
                <span id="check" class="material-symbols-outlined">
                    check
                </span>
                <span id="add2" class="material-symbols-outlined">
                    add
                </span>
            </div>
        </section> -->
        <table id="table">
            <tr>
                <td>
                    <input type="checkbox" id="checkbox1" placeholder="check1">
                </td>
                <td>
                    <textarea  id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea>
                </td>
                <td>
                    <span id="delete" class="material-symbols-outlined" onclick="questao.apagar()">delete</span>
                </td>
                <td>
                <span id="check" class="material-symbols-outlined">check</span>
                </td>
                <td>
                <span id="add2" class="material-symbols-outlined" onclick="adicionar()">add</span>
                </td>
                
            </tr>
        </table>
        <hr>
        <footer class="divBotoesInfer">
            <span id="add_box" class="material-symbols-outlined">
                add_box
            </span>
            <div class="botoesSR">
                <!-- <input type="button" id="botaoRascunho" value="Rascunho"> -->
                <input type="button" id="botaoSalva" value="Salvar formulário">
            </div>
        </footer>

    </section>
</body>
</html>
<!-- teste  -->