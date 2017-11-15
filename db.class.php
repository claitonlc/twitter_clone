<?php

class db {

	private $host = 'localhost';
	private $usuario = 'root';
	private $senha ='';
	private $database ='twitter_clone';

	public function conecta_mysql(){

		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		mysqli_set_charset($con, 'utf8');

		//verifcar erro de conexão

		if(mysqli_connect_errno()){

			echo "Erro de conexão com o BD: ".mysqli_connect_error();
		}

		return $con;
		}

	}


?>