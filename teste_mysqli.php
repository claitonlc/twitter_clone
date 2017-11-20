<?php  
session_start();

require_once('db.class.php');



//print_r($_POST);

$sql = "SELECT * FROM usuarios";

//echo $sql;
//exit;

$objDb =  new db();
$link = $objDb->conecta_mysql();

$resultado = mysqli_query($link, $sql);

if ($resultado) {

	$dados_usuario = array();

	 while($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

	 		 	$dados_usuario[] = $linha;
	 }

foreach ($dados_usuario as $usuario) {

	echo '<br/><br/>';
	echo $usuario['email'];

}




}






?>