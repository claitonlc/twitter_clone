<?php
session_start();

require_once('db.class.php');

$nome_pessoa = $_POST['nome_pessoa'];
$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT * from usuarios WHERE usuario LIKE '%$nome_pessoa%' AND id <> $id_usuario ";

$resultado =  mysqli_query($link, $sql);
//echo $sql;
if($resultado){

	while($registro =  mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

		echo '<a href="#" class="list-group-item">';
		echo '<strong>'.$registro['usuario'].'</strong> <small> - '.$registro['email'].' </small>';
		echo '<p class="list-group-item-text pull-right">';
		echo '<button type="button" class="btn btn-default btn_seguir" data-id_usuario="'.$registro['id'].'">Seguir</button>';
		echo '</p>';
		echo '<div class="clearfix"></div>';
		echo '</a>';

	}

} else {
	echo 'Erro no banco de dados!';

}


?>