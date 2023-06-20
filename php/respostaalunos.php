<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Resultado</title>
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/styleRespostaAlunos.css">
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

    <!-- ///////////////// -->

    <section class="containerConteudo">
        <!-- titulo pag -->
    
            <!-- infos add forms -->
            <header class="containerInfoForms">
                <div class="divInfoForms">
                    <h1>Nome Aluno</h1>
                    <a>Concluido em:</a>
                    <a>xx/xx/xxxx</a>
                    <a class="espace"></a>
                    <a>Acertos:</a>
                    <a>xx/xx</a>
                </div>
                <a class="porcent">00%</a>
            </header>

            <!-- lista de alunos -->
            
            <section class="divResultC">
                <div class="divInfoResposta">   
                    <div class="numero">
                        <a>Questão 1</a>
                    </div>
                    <div class="respostaCerta">
                        <a>Gabarito:</a>
                        <a>A</a>
                    </div>
                    <div class="respostaAluno" >
                        <a>Resposta Enviada:</a>
                        <a>A</a>
                    </div>   
                    <span id="check" class="material-symbols-outlined">
                        check
                        </span>               
                </div>
            </section>
            <section class="divResultE">
                <div class="divInfoResposta">   
                    <div class="numero">
                        <a>Questão 2</a>
                    </div>
                    <div class="respostaCerta">
                        <a>Gabarito:</a>
                        <a>D</a>
                    </div>
                    <div class="respostaAluno" >
                        <a>Resposta Enviada:</a>
                        <a>C</a>
                    </div>   
                    <span id="close" class="material-symbols-outlined">
                        close
                    </span>            
                </div>
            </section>
            <section class="divResultC">
                <div class="divInfoResposta">   
                    <div class="numero">
                        <a>Questão 3</a>
                    </div>
                    <div class="respostaCerta">
                        <a>Gabarito:</a>
                        <a>B</a>
                    </div>
                    <div class="respostaAluno" >
                        <a>Resposta Enviada:</a>
                        <a>B</a>
                    </div>   
                    <span id="check" class="material-symbols-outlined">
                        check
                        </span>               
                </div>
            </section>
            <section class="divResultE">
                <div class="divInfoResposta">   
                    <div class="numero">
                        <a>Questão 4</a>
                    </div>
                    <div class="respostaCerta">
                        <a>Gabarito:</a>
                        <a>A</a>
                    </div>
                    <div class="respostaAluno" >
                        <a>Resposta Enviada:</a>
                        <a>B</a>
                    </div>   
                    <span id="close" class="material-symbols-outlined">
                        close
                    </span>            
                </div>
            </section>
            <section class="divResultE">
                <div class="divInfoResposta">   
                    <div class="numero">
                        <a>Questão 5</a>
                    </div>
                    <div class="respostaCerta">
                        <a>Gabarito:</a>
                        <a>C </a>
                    </div>
                    <div class="respostaAluno" >
                        <a>Resposta Enviada:</a>
                        <a>A</a>
                    </div>   
                    <span id="close" class="material-symbols-outlined">
                        close
                    </span>            
                </div>
            </section>
    </section>
    
</body>
</html>