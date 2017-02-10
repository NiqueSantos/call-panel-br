<?php

//INCLUDE DA CONEXÃO
require_once("config.php");
$pdo = conectar();



//************************************
//-------VERIFICA CHAMADAS-------

$buscar=$pdo->prepare("SELECT id, importance, nunber, counter, message FROM $table WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') AND visualized = '0' AND counter != '0' LIMIT 1");
$buscar->execute();

//SE ENCONTROU ALGUMA COISA
if($buscar->rowCount() != 0){

	$linha = $buscar->fetchAll(PDO::FETCH_OBJ);
	foreach ($linha as $listar) {
		
		$id 		=	$listar->id;
		$importance =	$listar->importance;
		$nunber		=	$listar->nunber;
		$counter	=	$listar->counter; 	
		$message	=	$listar->message;

	}

	$um			=	$lang_contents["um"];
	$tres		=	$lang_contents["dois"];
	$blink		=	"true";

	if($nunber < 10){
		$nunber = "0".$nunber;
	}

	if($counter < 10){
		$counter = "0".$counter;
	}

	$visu = 1;

}else{

	//BUSCA O ULTIMO RESULTADO
	$buscar=$pdo->prepare("SELECT id, importance, nunber, counter, message FROM $table WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') AND visualized = '1' AND counter != '0' ORDER BY id DESC LIMIT 1");
	$buscar->execute();

	//SE ENCONTROU ALGUMA COISA
	if($buscar->rowCount() != 0){

		$linha = $buscar->fetchAll(PDO::FETCH_OBJ);
		foreach ($linha as $listar) {
			
			$id 		=	$listar->id;
			$importance =	$listar->importance;
			$nunber		=	$listar->nunber;
			$counter	=	$listar->counter; 	
			$message	=	$listar->message;

		}

		$um			=	$lang_contents["um"];
		$tres		=	$lang_contents["dois"];
		$blink		=	"false";

		if($nunber < 10){
			$nunber = "0".$nunber;
		}

		if($counter < 10){
			$counter = "0".$counter;
		}

	}else{

		$nunber		=	"";
		$counter	=	""; 	
		$um			=	"";
		$tres		=	"";
		$importance =	0;

		$message	=	$lang_contents["message"];
		$blink		=	"false";

	}

	$visu = 2;

}


//************************************
//-------MARCA COMO VISUALIZADA-------

if($id != "" AND $visu == 1){

	$atualiza=$pdo->prepare("UPDATE $table SET `visualized`= 1 WHERE id = :id");
	$atualiza->bindvalue(":id", $id, PDO::PARAM_INT);
	$atualiza->execute();

	//SE ENCONTROU ALGUMA COISA
	if($atualiza->rowCount() == 0){

		$message = $lang_contents["visu_error"];

	}
}


$array = array(

	'importance'	=> $importance, //INPORTACIA DA CHAMADA
	'um' 			=> $um,
	'dois' 			=> $nunber, //Número da cha

	'tres' 			=> $tres,
	'quatro'		=> $counter, //Guichê

	'cinco'			=> $message, //Mensagem

	'blink'			=> $blink

);

header('Content-Type: application/json; charset=UTF-8');

echo json_encode($array);

//ENCERRA O SCRIPT
exit;

?>