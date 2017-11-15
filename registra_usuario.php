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
$senha =    (isset($_POST['senha'])) ? $_POST['senha'] : '';

//var_dump($_POST);
//exit;

//inserir dados na tabela usuarios
$objDb = new db();
$link = $objDb->conecta_mysql();

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



