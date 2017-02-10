function RequireNumber(N) {
	
	if(N == "")	return false;

	//alert(N);

	//inicio uma requisição
    $.ajax({
        url : "cliente_call.php?acao="+N,// url para o arquivo json.php
        dataType : "json", // dataType json
        success : function(data){ // função para de sucesso

            var html = "<span id='message'>"+data.um+":</span><br><h1 class='h1'>"+data.dois+"</h1>"+data.qr+"<br /><button class='button_again' onclick='Again()'>"+data.ok+"</button>";

            $('#all').html(html);//coloco a variável html na tela

        
        }

    });//termina o ajax


}

function Again() {
	
	//inicio uma requisição
    $.ajax({
        url : "cliente_call.php",// url para o arquivo json.php
        dataType : "json", // dataType json
        success : function(data){ // função para de sucesso

            var html = "<span id='message'>"+data.title_dois+":</span><br><br><button class='button_cliente' onclick="+"RequireNumber('1')"+">"+data.normal+"</button><button class='button_cliente_yellow' onclick="+"RequireNumber('2')"+">"+data.urgence+"</button><button class='button_cliente_red' onclick="+"RequireNumber('3')"+">"+data.emerge+"</button>";

            $('#all').html(html);//coloco a variável html na tela

        
        }

    });//termina o ajax
}

