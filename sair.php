<?php
session_start();   // inicia sessão que foi aberta

unset($_SESSION['usuario'],$_SESSION['email']);
	
//redirecionar o usuario para a página principal
header("Location: index.php");
?>
