<?php

//INCLUDE DA CONEXÃO
require_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title><?php echo $lan_index["title"]; ?></title>
	<link type="text/css" rel="stylesheet" href="style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script async src="index.js"></script>
	
</head>

<body id="panel">

	<audio id='playAudio'>
	  <source src="notify.mp3" type="audio/mpeg">
	  <?php echo $lan_index["error_audio"]; ?>
	</audio>

	<div id="all">

	 	<span id="message"><?php echo $lan_index["loand"]; ?></span>

	</div>

</body>
</html>