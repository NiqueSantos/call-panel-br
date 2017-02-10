<?php

if(isset($_GET["id"])){

	$id = $_GET["id"];

	//INCLUDE DA CONEXÃO
	require_once("../config.php");
	$pdo = conectar();

	$muda=$pdo->prepare("UPDATE $table SET visualized = '0' WHERE id = :id");
	$muda->bindvalue(":id", $id, PDO::PARAM_INT);
	$muda->execute();

	//SE ENCONTROU ALGUMA COISA
	if($muda->rowCount() == 0){

		echo "Erro";

	}else{

		echo "Ok";

	}

}


?>