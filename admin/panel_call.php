<?php

//INCLUDE DA CONEXÃO
require_once("../config.php");


//************************************
//-------VERIFICA CHAMADAS-------
$pdo = conectar();
$buscar=$pdo->prepare("SELECT id, importance, nunber, message FROM $table WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') AND visualized = '0' AND call_number = '0' ORDER BY id LIMIT 1");
//SELECT id, importance, nunber, message FROM $table WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') AND visualized = '0' AND call_number = '0' ORDER BY id LIMIT 1
$buscar->execute();

//SE ENCONTROU ALGUMA COISA
if($buscar->rowCount() != 0){

	$linha = $buscar->fetchAll(PDO::FETCH_OBJ);
	foreach ($linha as $listar) {
		
		$id 		=	$listar->id;
		$importance =	$listar->importance;
		$nunber		=	$listar->nunber;
		$message	=	$listar->message;

	}

	if($nunber < 10){
		$nunber = "0".$nunber;
	}


}else{

	$nunber		=	"";
	$importance =	"0";
	$message	=	$lang_contents["message"];

}



//*************************
//MARCA O GUICHÊ QUE CHAMOU

if(isset($id)){

	$guiche_numero = $_GET["guiche_numero"];

	$verifica=$pdo->prepare("UPDATE $table SET counter = :guiche, call_number = 1 WHERE id = :id");
	$verifica->bindvalue(":id", $id, PDO::PARAM_INT);
	$verifica->bindvalue(":guiche", $guiche_numero, PDO::PARAM_INT);
	$verifica->execute();

	if($buscar->rowCount() == 0){

		$message = "Erro ao colocar o numero do GUICHÊ";

	}

}


//*************************
//VERIFICA QUANTOS AINDA TEM

$verifica=$pdo->prepare("SELECT id, importance, nunber, message FROM $table WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') AND visualized = '0' AND call_number = '0' ORDER BY id");
$verifica->execute();

$seis = $verifica->rowCount();

/*if ($seis != 0) {
	
	$seis = $seis - 1;

}*/

if($seis < 10){

	$seis = "0".$seis;
	
}


$array = array(

	'id'		=> $id,

	'um' 		=> $panel["client_nunber"],
	'dois' 		=> $nunber,

	'tres' 		=> $panel["call_nunber"],
	'quatro' 	=> $message,

	'cinco' 	=> $panel["fila"],
	'seis' 		=> $seis,

	'sete'		=> $importance//inportancia

);

header('Content-Type: application/json; charset=UTF-8');

echo json_encode($array);


?>