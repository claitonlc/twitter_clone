<?php  
session_start();

require_once('db.class.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


//print_r($_POST);

$sql = "SELECT * FROM usuarios WHERE usuario= '$usuario' AND senha= '$senha'";

//echo $sql;
//exit;

$objDb =  new db();
$link = $objDb->conecta_mysql();

$resultado = mysqli_query($link, $sql);

if ($resultado) {

	$dados_usuario = mysqli_fetch_array($resultado);

	if(isset($dados_usuario['usuario'])){

		$_SESSION['usuario'] = $dados_usuario['usuario'];
		$_SESSION['email'] = $dados_usuario['email'];

		//echo "Usuário existe!";
		header("Location: home.php");
	} else {

		echo "Usuário inexistente!";

		header("Location: index.php?erro=1");
	}
} else {

	echo "Ocorreu um erro!";
}



//var_dump($dados_usuario);


?>