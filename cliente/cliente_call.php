<?php


if (isset($_GET["acao"])) {

	//INCLUDE DA CONEXÃO
	require_once("../config.php");
	$pdo = conectar();


	$inpor = $_GET["acao"];


	$busca=$pdo->prepare("SELECT id, nunber FROM call_panel WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') ORDER BY id DESC LIMIT 1");
	$busca->execute();

	//SE ENCONTROU ALGUMA COISA
	if($busca->rowCount() != 0){

		$linha = $busca->fetchAll(PDO::FETCH_OBJ);
		foreach ($linha as $listar) {
			
			$id 		=	$listar->id + 1;
			$nunber		=	$listar->nunber + 1;

		}

	}else{

		$nunber = 1;

	}
	
	if($inpor == 1){

		$inpor = 0;
		$message = $cliente_call["normal"];

	}elseif ($inpor == 2) {

		$inpor = 1;
		$message = $cliente_call["urgence"];
		
	}else{

		$inpor = 2;
		$message = $cliente_call["emerge"];

	}

	
	$insert=$pdo->prepare("INSERT INTO `call_panel`(`id`, `importance`, `message`, `nunber`, `counter`, `date_insert`, `date_call`, `call_number`, `visualized`) VALUES (null, :inportance, :message, :nunber, null, NOW(), '', 0, 0)");
	$insert->bindvalue(":inportance", $inpor, PDO::PARAM_INT);
	$insert->bindvalue(":message", $message, PDO::PARAM_INT);
	$insert->bindvalue(":nunber", $nunber, PDO::PARAM_INT);
	$insert->execute();

	if($insert->rowCount() != 0){

		$seu_numero = $cliente_call["you"];

		if($nunber < 10){

			$nunber = "0".$nunber;

		}

	}else{

		$nunber = "erro";		

	}



	function QrCode($id){
	
		//VERIFICA O PROTOCOLO
		$protocolo 	= $_SERVER['HTTPS'];
		$site 		= $_SERVER['SERVER_NAME']; 


		if($protocolo == true){

			$protocolo = "https://";

		}else{

			$protocolo = "http://";

		}

		//URL COM O PROTOCOLO ATUAL
		$caminho = $protocolo.$site."/mobile/?id=".$id;

		//******************************************************************************************
		//									Warning:
		//This API is deprecated. Charts that Google may stop working at any time
		//Read more: https://developers.google.com/chart/infographics/docs/qr_codes

		$link = 'https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.$caminho.'&choe=UTF-8';
		//$link = 'http://chart.apis.google.com/chart?cht=qr&chl='.$caminho.'&chs=250x250';

		//-------------------------------------------------------------------------------------------

		$link = '<img src="'.$link.'">';

		return $link;
	}

	$qr = QrCode($id);




	$array = array(

		'um'	=> $seu_numero,
		'dois' 	=> $nunber,
		'ok'	=> $cliente_call["ok"],
		'qr'	=> $qr

	);

	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($array);

}else{

	//INCLUDE DA CONEXÃO
	require_once("../config.php");
	$pdo = conectar();


	$array = array(

		'title_dois'	=> $cliente_call["title_dois"],
		'normal'		=> $cliente_call["normal"],
		'urgence' 		=> $cliente_call["urgence"],
		'emerge'		=> $cliente_call["emerge"]

	);

	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($array);


}


?>