
function Next(){

    guiche_numero = $('#guiche_numero').val();

    if(guiche_numero == ""){
        alert('Selecione um guichê!');
        return false;
    }

    $('#infor_contents').html("<br><br><span>...</span>");//coloco a variável html na tela

    next_txt = $('#next').html();
    $('#next').html("...");

    //inicio uma requisição
    $.ajax({
        url : "panel_call.php?guiche_numero="+guiche_numero,// url para o arquivo json.php
        dataType : "json", // dataType json
        success : function(data){ // função para de sucesso

            var html = "<br><br><span>"+data.um+":</span> <br><br><span class='nunber'>"+data.dois+"</span> <br><br><span>"+data.tres+":</span> <br><br><span class='nunber'>"+data.quatro+"</span> <br><br><span>"+data.cinco+":</span> <br><br><span class='nunber'>"+data.seis+"</span><input type='hidden' id='ClinteNumero' value='"+data.id+"'>"

            $('#infor_contents').html(html);//coloco a variável html na tela

            var Cores = [
            	'#4474BC',
            	'#A4BC44',
            	'#BC5544'
            ];

           $("#infor").css("background-color", Cores[data.sete]);

           $('#next').html(next_txt);//coloco a variável html na tela    

        
        }

    });//termina o ajax

}


function CallAgain(){

    var ClinteNumero = $('#ClinteNumero').val();

    //alert(ClinteNumero);

    if(ClinteNumero == undefined){

        return false;

    }

     //inicio uma requisição
    $.ajax({
        url : "call_again.php?id="+ClinteNumero,// url para o arquivo json.php
        dataType : "json", // dataType json
        success : function(data){ // função para de sucesso

            

        }

    });//termina o ajax

    var aler = $("#again").value();

    alert(aler); 

}