<?php

//INCLUDE DA CONEXÃO
require_once("../config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title><?php echo $panel["title"]; ?></title>
	<link type="text/css" rel="stylesheet" href="../style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script async src="panel.js"></script>
	
</head>

<body id="page">

	<div id="menu">
		<button class="button_white" onclick="window.open('../index.php');" title="<?php echo $panel["botton_um"]; ?>"><?php echo $panel["botton_um"]; ?></button>
		<button class="button_white" onclick="window.open('../cliente');" title="<?php echo $panel["botton_dois"]; ?>"><?php echo $panel["botton_dois"]; ?></button>
		
		<a href="" title="" style="margin-left: -3em;"><?php echo $panel["title"]; ?></a>
	</div>

	<div id="all_page">
		
		<div id="infor">
			
			<select id="guiche_numero" title="<?php echo $panel["select"]; ?>" required>
				<option value=""><?php echo $panel["select"]; ?></option>
				<?php

					for ($i=1; $i <= $counter_namber; $i++) { 
						echo '<option value="'.$i.'">'.$panel["eu_guiche"].' '.$i.'</option>';
					}

				?>
			</select>

			<br /><button class="button" id="next" onclick="Next()" title="<?php echo $panel["next"]; ?>"><?php echo $panel["next"]; ?></button>

			<div id="infor_contents">	

				<?php

					//*************************
					//VERIFICA QUANTOS AINDA TEM
					$pdo = conectar();
					$verifica=$pdo->prepare("SELECT id, importance, nunber, message FROM $table WHERE DATE_FORMAT(date_insert, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d') AND visualized = '0' ORDER BY id");
					$verifica->execute();

					$seis = $verifica->rowCount();

					if($seis < 10){

						$seis = "0".$seis;
						
					}


				?>

				<br><br>
				<span>
					<?php echo $seis; ?>
					<br>
					<?php echo $panel["msg_defalt"];?>
				</span>

			</div>

			<br><br>
			<button class="button" id="again" onclick="CallAgain();" title="<?php echo $panel["call_agan"]; ?>"><?php echo $panel["call_agan"]; ?></button>

		</div>

		<div id="contents">
			algum conteúdo aqui
		</div>

	</div>

</body>
</html>