<?php
require_once("php/connection.php");
?>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Recuperação de senha</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php
	if(isset($_GET['codigo'])){
	$codigo = $_GET['codigo'];
	$email_codigo = base64_decode($codigo);
	$selecionar = mysqli_query("SELECT * FROM `codigos` WHERE `codigo` = '$codigo' AND data > NOW()");
	if(mysqli_num_rows($selecionar) >= 1){
		if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){
			$nova_senha = $_POST['novasenha'];
			$atualizar = mysqli_query("UPDATE `users` SET `senha` = `$nova_senha` WHERE `email` = '$email_codigo'");
			if($atualizar){
				$mudar = mysqli_query("DELETE FROM `codigos` WHERE codigo = '$codigo'");
				echo 'Sua senha foi modificada com sucesso.';
			}
		} 
?>
	<section class="container">
		<div class="row">
		<h3 class="center-align">Digite a nova senha</h3>
			<article class="col s6 offset-s3">
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<label for="novasenha">Nova senha:</label>
						<input type="text" name="novasenha" required>
					</div>
					<p class="center-align">
						<button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>enviar</button>
					</p>
				</form>

			</article>
		</div>
	</section>
	<?php
		}else{
			echo '<h1>Desculpe, mais este link já expirou!</h1>'
		}
		
		?>

	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</body>
</html>