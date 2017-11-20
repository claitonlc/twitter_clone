<?php
require_once('db.class.php');
//redebe os dados do formulário
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro Usuário</title>
			<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container theme-showcase" role="main">
		<?php
$usuario =  (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$email =    (isset($_POST['email'])) ? $_POST['email'] : '';
$senha =   md5($_POST['senha']);

//var_dump($_POST);
//exit;

//inserir dados na tabela usuarios
$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;
$email_existe = false;


//verificar se usuario ja existe no bd
$sql = " SELECT * FROM usuarios where usuario = '$usuario' ";

if ($resultado = mysqli_query($link, $sql)){

	$dados_usuario = mysqli_fetch_array($resultado);

	if(isset($dados_usuario['usuario'])){

		$usuario_existe = true;

     //echo 'O usuário ' .$usuario.' já está cadastrado!';

	} 
	} else {

	echo 'Erro ao tentar localizar o registro do usuario: .$usuario.';

}


//verificar se email não existe
$sql = " SELECT * FROM usuarios where email = '$email' ";

if ($resultado = mysqli_query($link, $sql)){

	$dados_usuario = mysqli_fetch_array($resultado);

	if(isset($dados_usuario['email'])){
		$email_existe = true;

     //echo 'O e-mail ' .$email.' já está cadastrado!';

	} 
	} else {

	   echo 'Erro ao tentar localizar o registro do email: .$email.';

}

if ($usuario_existe || $email_existe) {

	$retorno_get = '';

	if ($usuario_existe) {

		$retorno_get.= "erro_usuario=1&";
	}
	if($email_existe){

		$retorno_get.="erro_email=1&";
	}

	header("Location: inscrevase.php?" .$retorno_get);
}


//die();

$sql =  "INSERT INTO usuarios(usuario, email, senha) values ('$usuario','$email','$senha')";

//executa query
 mysqli_query($link,$sql);
//header("Location: inscrevase.php");
//exit;
		if(mysqli_affected_rows($link) > 0){ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Usuário cadastrado com Sucesso!</h4>
						</div>
						<div class="modal-body">
							<?php echo $usuario; ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Cadastro</button>
							<a href="index.php"><button type="button" class="btn btn-success">Ok</button></a>
						</div>
					</div>
				</div>
			</div>				
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});
			</script>
		<?php }else{ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Erro ao cadastrar o usuário!</h4>
						</div>
						<div class="modal-body">								
							<?php echo $usuario; ?>
						</div>
						<div class="modal-footer">
							<a href="index.php"><button type="button" class="btn btn-danger">Ok</button></a>
						</div>
					</div>
				</div>
			</div>			
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});
			</script>
		<?php } ?>
</div>
	</body>
</html>
