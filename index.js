function StartBlink(){
	
	//GET THE BACKGROUND PAGE COLOR - PEGA A COR DE FUNDA DA PÁGINA	
	var Cor = document.body.style.backgroundColor;

	//ORANGE AND THE BACKGROUND PAGE COLOR - LARANJA E A COR DE FUNDO DA PÁGINA
	var Cores = ['#FF9812', Cor],
   	i = 0;
   	

   	//START THE NOTIFICATION SOUND - INICIA O SOM DE NOTIFICAÇÃO
   	function Play() {
		var playAudio = document.getElementById("playAudio");
		playAudio.play();
	}

	//STOP BLINK - PARAR DE PISCAR
	function StopBlink() {	
		setTimeout(
			function() {

				/*APAGA*/
				document.body.style.backgroundColor = Cor;

			},
		800);
	}

	//START BLINK - COMEÇA A PISCAR
	setTimeout(
		function() {

			/*ACENDE*/
			document.body.style.backgroundColor = Cores[i];

			StopBlink();

			//PLAY SOUND - TOCA O SOM
			Play();


		},
	100);

}/*AND OF StartBlink - FIM DO StartBlink*/






//$(document).ready(function() {

function Verifica(){

	//inicio uma requisição
    $.ajax({
        url : "contents.php",// url para o arquivo json.php
        dataType : "json", // dataType json
        success : function(data){ // função para de sucesso
        
            var html = "<span>"+data.um+"</span><h1>"+data.dois+"</h1><span>"+data.tres+"</span><h1>"+data.quatro+"</h1><span id='message'>"+data.cinco+"</span>";
 
            $('#all').html(html);//coloco a variável html na tela

            var Cores = [
            	'#4474BC',
            	'#A4BC44',
            	'#BC5544'
            ];


            document.body.style.backgroundColor = Cores[data.importance];


            if(data.blink == "true"){

            	StartBlink();

            }

        }

    });//termina o ajax

//});//termina o jquery
}


var refreshId = setInterval(function() {
      
    //alert("teste");

    Verifica();
      
}, 10000);