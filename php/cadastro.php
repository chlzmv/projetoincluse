<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/stylecadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../js/botoestela.js"> </script>
</head>
<body >
    <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li href="#" class="close" onclick="window.location='index.php';"></li>
        </ul>
    </header>
    <!--menu  flutuante  -->
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
        
        <form action="cadastro.php" method="post">
            <input class="input" type="fname" id="fname" name="fnome" placeholder="Nome completo">
            <input class="input" type="email" id="email" name="email"placeholder="Email">
            <input class="input" type="password" id="senha" name="senha" placeholder="Senha">
            <input class="input" type="password" id="csenha" name="csenha" placeholder="Confirmar senha">
            <p class="message">    
                <?php
                    if (isset($_POST['btn-entrar'])){
                    $erros = array();
            
                
                    //1 - capturar e sanitizar dados   
                    $nome = filter_input(INPUT_POST,'fnome',FILTER_SANITIZE_SPECIAL_CHARS);            
                    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);            
                    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);            
                    $senha = md5($senha);
                    $csenha = filter_input(INPUT_POST,'csenha',FILTER_SANITIZE_NUMBER_INT);
                    $csenha = md5($csenha);
                    //3 - validar
                    $res = array("options"=>array("regexp"=>"/^([a-zA-Z]+\s)*[a-zA-Z]+$/"));
                    if(! filter_var($nome, FILTER_VALIDATE_REGEXP,$res)) {		  
                        $erros[]= "Nome deve possuir somente letras [a-zA-Z].";
                    }

                    if(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)===false) {
                        $erros[] = "Email inválido";
                    } 
                    
                    if($senha <> $csenha){
                        echo "Senhas não coincidem";                  
                    }

                    else {
                        if (!empty($erros)){
                            foreach($erros as $erro):
                                echo "<li> $erro </li>";
                            endforeach;
                        } else {
                            //Conexão
                            require_once 'dbconexao.php';

                            $sql="INSERT INTO usuario(nomUser,dscEmailUser,senhaUser) VALUES ('$nome','$email','$senha')";
                            if(mysqli_query($connect,$sql)){
                                echo "Parabéns, seus dados estão corretos!";
                                header("Location: login.php ");   
                                
                            }else{
                                echo "Erro ao cadastrar!";		                    
                            }    
                        }	
                    }
                    }
                ?> 
            </p>
            <input class="button" type="submit" value="Confirmar" name="btn-entrar">
        </form>
    </section>
    
    
</body>
</html>
