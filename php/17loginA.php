<?php

//Conexão
//The require_once expression is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
require_once 'db_connect.php';

//iniciar a sessão
session_start();

//se existir o indice btn_entrar , é porque alguem clicou no botão
if (isset($_POST['btn-entrar'])):
	//echo "Clicou";
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	
	
	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	endif;
endif;
?>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>

<h1> Login</h1>
<hr>
<?php
if(!empty($erros)):
	foreach($erros as $erro):
		echo $erro;
	endforeach;
endif;
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

Login: <input type="text" name="login"><br>
Senha: <input type="password" name="senha"><br>
<button type="submit" name="btn-entrar"> Entrar </button>
</form>

</body>
</html>