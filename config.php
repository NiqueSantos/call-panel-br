<?php

$counter_namber = 5;

//**********************
$lang = "en-US";

include "lang/$lang.php";
//----------------------


$table	= "call_panel";

function conectar(){

	$host 	= "localhost";
	$dbname = "collulo_plugins";
	$user 	= "root";
	$passwd = "sougoias";

	try{
		$pdo=new PDO("mysql:host=$host;dbname=$dbname;","$user","$passwd");
	}
	catch(PDOException $e){

		echo $e->getMessage();

	}

	return $pdo;

}

?>