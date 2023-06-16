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
	//mysqli_escape_string - função que limpa os dados e evita sqlinjection e outros caracteres indevidos.
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	
	
	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	else:
		//criptografando a senha
		$senha=md5($senha);
		//usuario: marta/senha:123456
		$sql= "SELECT id,login FROM usuarios WHERE login= '$login' AND senha='$senha'";
		
		$resultado = mysqli_query($connect,$sql);
		//fechando a conexão depois de armazenar os dados
		mysqli_close($connect);
		
		//numeros de linhas do resultado da query maior que 0 ou Se houver algum registro na tabela
		if (mysqli_num_rows($resultado) > 0):
			$dados=mysqli_fetch_array($resultado);
			$_SESSION['logado']= true;
			$_SESSION['id_usuario']= $dados['id'];
			//comenado que redireciona para página 16home.php - deve criar essa página
			header('Location: 17home.php');		
		
		else:
			$erros[]="<li>Usuário e senha não conferem.</li>";
			
		endif;
		
	endif;	
endif;	

include "17header.php";
?>

<br><br><br>
<!-- <h1> Autenticação</h1> -->
<hr>
<div class="d-flex justify-content-center">

	<div class="card  col-xl-2" >
		<div class="card-header">
		Autenticação
	</div>
		<div class="card-body">
			<?php
			if(!empty($erros)):
				foreach($erros as $erro):
					echo $erro;
				endforeach;
			endif;
			?>
				<div class="row mb-3 g-2">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					
						<div class="form-group ">
							<label class="form-label" for="txtlogin">Login:</label>
							<input type="text" name="login" class="form-control" id="txtlogin"><br>
						</div>
						<div class="form-group ">		
							<label class="form-label" for="txtsenha">Senha:</label>
							<input type="password" name="senha" class="form-control" id="txtsenha"><br>
						</div>
						<button type="submit" name="btn-entrar" class="btn btn-primary"> Entrar </button>
								
					</form>
				</div>
			</div>
		</div>
</div>



<?php include "17footer.php"; ?>
	<!-- BOOSTRAP JAVASCRIPT -->
	