<?php

//se existir o indice btn_entrar , é porque alguem clicou no botão
if (isset($_POST['btn-entrar'])):
	echo md5("12345");
endif;
?>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<!-- BOOSTRAP CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

	<h1> Autenticação</h1>
	<hr>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<div class="form-group">
			<label class="form-label" for="txtlogin">Login:</label>
			<input type="text" name="login" id="txtlogin"><br>
		</div>
		<div class="form-group">		
			<label class="form-label" for="txtsenha">Senha:</label>
			<input type="password" name="senha" id="txtsenha"><br>
		</div>
		<button type="submit" name="btn-entrar" class="btn btn-primary"> Entrar </button>
				
	</form>

	<!-- BOOSTRAP JAVASCRIPT -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>