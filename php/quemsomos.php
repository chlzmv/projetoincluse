<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Quem Somos</title>
    <!-- Aqui chamamos o nosso arquivo css e javascript externo -->
    <script src="../js/botoestela.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/stylequemsomos.css" />
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



            <li class="liLogin2">
                <ul>
                    <li><input type="button" id="botaoCad" value="Cadastre-se" onclick="window.location='cadastro.php';"></li>
                    <li><a href="login.php">Entrar</a></li>
                </ul>
            </li>
    </nav>

    <!-- botões menu hamburger -->
    <menu id="menu">
        <ul>
            <li><a href="quemsomos.php">Quem Somos?</a></li>
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

        <header class="divText">
            <h1>Acreditamos que a inclusão é um processo contínuo que exige compromisso</h1>
        </header>
        <section class="divText">
            <h2>Conheça a Incluse</h2>
            <a>Somos uma platafoma de formulário acessíveis, dedicado a tornar a experiência de preenchimento de formulários online mais fácil e inclusiva para todos os usuários. Nosso objetivo objetivo é oferecer uma solução eficente que permita que os usuários preencham formulário sem barreiras ou obstáculos, garantindo que todos possam participar igualmente em atividades acadêmicas.</a>
        </section>
        <section class="divText">
            <h2>Como Funciona</h2>
            <a>A Incluse é uma plataforma online que permite criar e personalizar formulários facilmente, sem a necessidade de conhecimento em programção. Com a versão de acessibilidade, ele permite criar formulários acessíveis para pessoas com baixa visão ou daltonismo. Além disso, a Incluse oferece recursos adicionais como leitor de tela, verificação de contraste de cores, para garantir que seu formulário seja acessível a todos os usuários. Com a Incluse você pode coletar informações de formar acessível, tornando sua organização mais inclusiva a todos os públicos.</a>
        </section>
        <section class="divText">
            <h2>Nossa Equipe</h2>
            <a>A equipe é formada por estudantes do Instituto Federal do Espírito Santo do curso de Técnico em informática. Foi projetado um site para oferecer melhor solução de formulário acessíveis. Cada membro da equipe trouxe habilidades e perspectivas únicas para o projeto, o que enriqueceu bastante o processo de desenvolvimento desse. </a>
            <figure class="photoTextCo">
                <p class="photoTextCo"><img src="../png/davi.png" width="150x" height="150px">
                <p class="pName">Davi Campos Sutil</p>
                <p class="pDesc">BACK-END FRONT-END</p>
            </figure>
            <figure class="photoTextCo">
                <p class="photoTextCo"><img src="../png/sthefany.png" width="150x" height="150px"></p>
                <p class="pName">Sthefany dos Santos</p>
                <p class="pDesc">BACK-END FRONT-END</P>
            </figure>
            <figure class="photoTextCo">
                <p class="photoTextCo"><img src="../png/vinicius.png" width="150x" height="150px"></P>
                <p class="pName">Vinícius Oliveira</p>
                <p class="pDesc">BACK-END FRONT-END</p>
            </figure>
            <figure class="photoTextCo">
                <p class="photoTextCo"><img src="../png/charlize.png" width="150x" height="150px"></a>
                <p class="pName">Charlize Moura</p>
                <p class="pDesc">BACK-END FRONT-END</ class="pDesc">
            </figure>

        </section>
    </section>

</body>

</html>