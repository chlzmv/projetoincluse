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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Criar Forms</title>
    <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css" href="../css/stylecriarpergunta.css" />
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
            <li>
                <a href="index.php" class="aplicafontelogo">Incluse.com</a>
            </li>
            <li class="liLogin">
                <div class="nomeUser"><?php echo "Olá, " . $nomeUsuario; ?></div>
                <div class="backgroundImagem"><img src="../png/iconUser.png" class="configimagem" onclick="clickProf()"></div>
            </li>
        </ul>
    </nav>

    <!-- botões menu hamburger   -->
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
            <li class="liProf"><a href="login.html" class="aProf">Trocar usuário</a></li>
            <li class="liProf"><a href="../php/logout.php" class="aProf">Sair</a></li>
        </ul>
    </menu>

    <!--menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">
            <span class="material-symbols-outlined" id="add1" onclick="adicionarQuestao()">add_circle</span>
            <span class="material-symbols-outlined" id="minus" onclick="ativarRemoverQuestao()">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>

    <!-- conteudo pagina -->
    <h1>Criar formulário</h1>
    <div class="container-form">
        <input type="hidden" id="idUser" name="idUser" value="<?php echo $idUser ?>" />
        <div class="container-form-title">
            <input type="text" id="tituloForm" class="titulo-form" name="tituloForm" placeholder="Título" />
            <input type="text" onkeypress="return validNumbers(event);" id="valorTotQuestn" class="amount-form" name="valorTotQuestn" placeholder="Valor total" />
        </div>

        <hr>

        <div id="sectionQuestions">
            <div id="question0" class="question">
                <div class="div-excluir hiddenBtn">
                    <p>Excluir essa Questão?</p>
                    <input type="button" class="botaoExcluir" value="Sim" onclick="removerQuestao(question0)" />
                </div>
                <section id="infoForm" class="divInfoForm">
                    <input type="text" onkeypress="return validNumbers(event);" name="numQuest[]" class="numQuest" placeholder="N° Questão" />
                    <input type="text" onkeypress="return validNumbers(event);" name="valorQuest[]" class="valorQuest" placeholder="Valor" />
                </section>
                <section id="caixaTexto" class="divCaixaTexto">
                    <textarea class="caixaTexto" name="caixaTexto[]" cols="30" rows="10" placeholder="Digite a pergunta."></textarea>
                </section>
                <section id="sectionOptions" class="sectionOptions">
                    <div id="option0" class="option">
                        <span id="check" class="btn-action material-symbols-outlined" onclick="checkOption(this.parentElement)">check</span>
                        <input type="hidden" name="check[]" value="false">
                        <textarea id="checkText" name="checkText[]" cols="30" rows="1" class="checkText" placeholder="Digite a opção de resposta."></textarea>
                        <span id="add" class="btn-add btn-action material-symbols-outlined" onclick="adicionarCampo(this.parentElement.parentElement)">add</span>
                    </div>
                </section>
                <hr>
            </div>
        </div>

        <footer class="footer">
            <div class="container-actions-footer">
                <span class="add_box btn-footer material-symbols-outlined" onclick="adicionarQuestao()">add_box</span>
                <span class="delete_box btn-footer material-symbols-outlined" onclick="ativarRemoverQuestao()">delete</span>
            </div>
            <input id="btn-salvar" type="submit" class="botaoSalva" name="btn-salvar" value="Salvar formulário" />
        </footer>
    </div>
</body>

<!-- Modal content -->
<div id="myModal" class="modal-content">
    <div class="modal-header">
        <h2>Atenção!</h2>
        <span class="close">&times;</span>
    </div>
    <div id="modal-body" class="modal-body">
    </div>
</div>

</html>