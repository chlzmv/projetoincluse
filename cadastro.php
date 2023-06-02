<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="stylecadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="botoestela.js"> </script>
</head>
<body >
    <?php
        if (isset($_POST['btn-entrar'])):
            $erros = array();
    
            //1 - capturar dados
            $nome=  $_POST['fnome'];
            $email=  $_POST['email'];
            $senha=  $_POST['senha'];
            $csenha=  $_POST['csenha'];

            //2 - sanitizar dados   
            $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_NUMBER_INT);
            $csenha = filter_input(INPUT_POST,'csenha',FILTER_SANITIZE_NUMBER_INT);
	        
            //3 - validar

            if (!empty($erros)):
                foreach($erros as $erro):
                    echo "<li> $erro </li>";
                endforeach;
            else:
                echo "Parabéns, seus dados estão corretos!";
            endif;	

            //echo 'capturando '.  $nome;
        endif;
    ?>
    
    <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li href="#" class="close" onclick="window.location='index.php';"></li>
        </ul>
    </header>
    <!--menu flutuante  -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add1">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>  

    <section class="container">
        <header class="divH1">
            <h1 >Cadastre-se</h1>
        </header>
        
        <form>
            <div class="divInputNome">
                <input class="inputNome" type="fname" id="fname" name="fnome" placeholder="Primeiro nome">
                <input class="inputNome" type="lname" id="lname" name="lname" placeholder="Último nome">
            </div>
            <input class="input" type="email" id="email" name="email"placeholder="Email">
            <input class="input" type="password" id="senha" name="senha" placeholder="Senha">
            <input class="input" type="password" id="csenha" name="csenha" placeholder="Confirmar senha">
            <input class="button" type="submit" value="Confirmar">
        </form>
    </section>

    
</body>
</html>
