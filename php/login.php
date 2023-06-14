<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Login</title>
    <link rel="stylesheet" href="../css/stylelogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../js/botoestela.js"> </script>
</head>
<body >
    <?php
    
    
    // if (isset($_POST['btn-entrar'])){
    //session_start();    
    //     echo "Clicou";
    //     $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);            
    //     $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING); 
    //     $senha = md5($senha);       
        
    //     $sql = "SELECT * FROM usuario WHERE dscEmailUser = '$email' and senhaUser = '$senha' LIMIT 1" ;
    //     $resultado = mysqli_query($connect, $sql);
        
    //     if(empty($resultado)){
    //         echo "Usuário ou senha invalido";
    //         header("Location: login.php");
    //     } elseif(isset($resultado)){
    //         header("Location: administrativo.php");
    //     } else{
    //         echo "Usuário ou senha invalido";
    //         header("Location: login.php");
    //     } 
    // } else{
    //     echo "n cliclou ainda";
    // }

    //Conexão
//The require_once expression is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
        // require_once 'dbconexao.php';

        //iniciar a sessão

        //Conexão com banco de dados
        $servername = "localhost"; //endereço do servidor
        $username="root";
        $password="usbw";
        $db_name="projetoincluse";

        //pdo - somente orientado objeto
        $connect = mysqli_connect($servername,$username,$password,$db_name);

        //codifica com o caracteres ao manipular dados do banco de dados
        //mysqli_set_charset($connect, "utf8");

        if(mysqli_connect_error()){
        echo "Falha na conexão: ". mysqli_connect_error();
        }else;
        session_start();

        //se existir o indice btn_entrar , é porque alguem clicou no botão
        if (isset($_POST['btn-entrar'])):
            
            echo "Clicou";
            $erros = array();
            //mysqli_escape_string - função que limpa os dados e evita sqlinjection e outros caracteres indevidos.
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);            
            $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING); 
            
            
            if(empty($email) or empty($senha)):
                echo "O campo login/senha precisa ser preenchido";
            else:
                //criptografando a senha
                $senha=md5($senha);
                //usuario: marta/senha:123456
                $sql= "SELECT * FROM usuarios WHERE dscEmailUser= '$email' AND senhaUser='$senha'";
                
                $resultado = mysqli_query($connect,$sql);
                //fechando a conexão depois de armazenar os dados
                mysqli_close($connect);
                
                //numeros de linhas do resultado da query maior que 0 ou Se houver algum registro na tabela
                if (mysqli_num_rows($resultado) > 0):
                    $dados=mysqli_fetch_array($resultado);
                    $_SESSION['logado']= true;
                    $_SESSION['email_usuario']= $dados['email'];
                    //comenado que redireciona para página 16home.php - deve criar essa página
                    header('Location: administrador.php');		
                
                else:
                    echo "Usuário e senha não conferem";
                    
                endif;
                
            endif;	
        endif;	

        // include "login.php";

    ?>
    <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li onclick="window.location='index.php';" class="close"></li>
        </ul>
    </header>
    <!--menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add1">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>  

    <section class="container">
        <h1 class="divH1">Entrar</h1>
        <!-- <hr class="hr" > -->
        <form action="login.php" method="post">
            <input class="input" type="email" id="email" name="email"placeholder="Email">
            <input class="input" type="password" id="senha" name="senha" placeholder="Senha">
            <nav class="divA">
                <a href="esqueceSenha.php">Esqueceu a senha?</a>
            </nav>
            <input class="button" type="submit" name="btn-entrar" value="Confirmar">
        </form>
    </section>
    
</body>
</html>