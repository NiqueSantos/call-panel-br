<?php

//INCLUDE DA CONEXÃO
require_once("../config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title><?php echo $cliente_call["title"]; ?></title>
	<link type="text/css" rel="stylesheet" href="../style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script async src="cliente.js"></script>
	
</head>

<body id="panel">

	<div id="all">

	 	<span id="message"><?php echo $cliente_call["title_dois"]; ?>:</span>
	 	
	 	<br><br>
	 	<button class="button_cliente" onclick="RequireNumber('1')"><?php echo $cliente_call["normal"]; ?></button>
	 	<button class="button_cliente_yellow" onclick="RequireNumber('2')"><?php echo $cliente_call["urgence"]; ?></button>
	 	<button class="button_cliente_red" onclick="RequireNumber('3')"><?php echo $cliente_call["emerge"]; ?></button>

	</div>

</body>
</html>