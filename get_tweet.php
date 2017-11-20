<?php
session_start();

require_once('db.class.php');


$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T' ) AS DATA_INCLUSAO,t.tweet, u.usuario ";
$sql.= " FROM tweet AS t JOIN usuarios  AS u on (t.id_usuario = u.id) "; 
$sql.= "where id_usuario = $id_usuario   order by data_inclusao desc ";


$resultado =  mysqli_query($link, $sql);
//echo $sql;
if($resultado){

	while($registro =  mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

		echo '<a href="#" class="list-group-item">';
		echo '<h4 class="list-group-item-heading">'.$registro['usuario'].'<small> - '.$registro['DATA_INCLUSAO'].'</small></h4>';
		echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
		echo '</a>';

	}

} else {
	echo 'Erro no banco de dados!';

}


?>