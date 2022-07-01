<?php

//Api.php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=rest",
			            "root",
			            "");

		$link->exec("set names utf8");
		
		return $link;

	}

}

?>