var ajaxRequest;
function escreveMsg(msg){
	if(msg.length > 5){
		$("#console").text(msg);
		$("#aviso").dialog({
			resizable: false,
			modal: true,
			buttons:{
				Ok: function(){
					$(this).dialog("close");
					if($("#naocarrega").length == 0){
						window.location.reload();	
					}
				}
			}
		});
	}	
}
$.excluir = function(path, id){
	$( "#dialog-confirm" ).dialog({
		resizable: false,
		modal: true,
		buttons: {
			"Excluir": function(){
				$(this).dialog("close");
				path = path + '_cmds.php?cmd=excluir&id=' + id;
				var form_excluir_default = { 
					url:		path,
					target:		'#console',
					success:	success_excluir_default,
					type:		'post'
				};
				$('form#cmds').ajaxSubmit(form_excluir_default);
			},
			"Cancelar": function(){
				$(this).dialog("close");
			}
		}
	});
}
$.abrir = function(url){
	var id = $('form#cmds input[type=checkbox]:checked').not('#checkAll');
	if(id.length == 1){
		id = id.val();
		url = url + '?cmd=abrir&id='+id;
		href(url);
	}
	else if(id.length == 0){
		console('Selecione um registro para abrir.');
	}
	else{
		console('Selecione somente um registro para abrir.');
	}
}

$.editar = function(url){
	var id = $('form#cmds input[type=checkbox]:checked').not('#checkAll');
	if(id.length == 1){
		id = id.val();
		url = url + '?cmd=editar&id='+id;
		href(url);
	}
	else if(id.length == 0){
		console('Selecione um registro para alterar.');
	}
	else{
		console('Selecione somente um registro para alterar.');
	}
}
function href(url){
	location.href = url;
}
$(function(){
	$("div#loading").ajaxStart(function(){
		$(this).show();
	});
	
	$("div#loading").ajaxStop(function(){
		$(this).hide();
	});
});

function completaZeroEsquerda( numero ){
	return ( numero < 10 ? "0" + numero : numero);
}
 
function possuiValor( valor ){
	return valor != undefined && valor != '' && valor != '00:00';
}

function isHoraInicialMenorHoraFinal(horaInicial, horaFinal){
    horaIni = horaInicial.split(':');
    horaFim = horaFinal.split(':');
 
    // Verifica as horas. Se forem diferentes, é só ver se a inicial
    // é menor que a final.
    hIni = parseInt(horaIni[0], 10);
    hFim = parseInt(horaFim[0], 10);
    if(hIni != hFim)
        return hIni < hFim;
     
    // Se as horas são iguais, verifica os minutos então.
    mIni = parseInt(horaIni[1], 10);
    mFim = parseInt(horaFim[1], 10);
    if(mIni != mFim)
        return mIni < mFim;
}
function diferencaHoras(horaInicial, horaFinal) {
	a = false;
 
    // Tratamento se a hora inicial é menor que a final
    if( ! isHoraInicialMenorHoraFinal(horaInicial, horaFinal) ){
        aux = horaFinal;
        horaFinal = horaInicial;
        horaInicial = aux;
		a = true;
    }
 
    hIni = horaInicial.split(':');
    hFim = horaFinal.split(':');
 
    horasTotal = parseInt(hFim[0], 10) - parseInt(hIni[0], 10);
    minutosTotal = parseInt(hFim[1], 10) - parseInt(hIni[1], 10);
     
    if(minutosTotal < 0){
        minutosTotal += 60;
        horasTotal -= 1;
    }
    if(a){
    	horaFinal = "-" + completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
	} else {
		horaFinal = completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
	}
    return horaFinal;
}
function somaHora(horaInicio, horaSomada) {
     
    horaIni = horaInicio.split(':');
    horaSom = horaSomada.split(':');
 
    horasTotal = parseInt(horaIni[0], 10) + parseInt(horaSom[0], 10);
    minutosTotal = parseInt(horaIni[1], 10) + parseInt(horaSom[1], 10);
     
    if(minutosTotal >= 60){
        minutosTotal -= 60;
        horasTotal += 1;
    }
     
    horaFinal = completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal);
    return horaFinal;
}
function carregarProjeto(){
	$('#carrega-projeto').load('projeto.php?cliente='+$('#carrega-cliente').val() );
}

function carregarTotal(){	
		var Inicial     = $("#horaini").val();
		var Final       = $("#horafim").val();
		var Translado   = $("#translado").val();
		var Desconto    = $("#desconto").val();
		console.log("teste");
		if(possuiValor(Inicial) && possuiValor(Final)){
			if(!isHoraInicialMenorHoraFinal(Inicial, Final)){
				alert("A hora fim não pode ser menor que a hora inicio!");
				return false;
            }/*else if(isHoraInicialMenorHoraFinal("06:01", Inicial) 
				   && isHoraInicialMenorHoraFinal(Inicial, "17:59")
				   && !isHoraInicialMenorHoraFinal(Final,"18:01")){
				alert("Caso a hora inicio esteja entre 06:00 e 17:59 a hora fim deve ser no máximo 18:00");
				return false;
			} else if(isHoraInicialMenorHoraFinal("18:01", Inicial) 
				   && isHoraInicialMenorHoraFinal(Inicial, "23:59")
				   && !isHoraInicialMenorHoraFinal(Final,"23:59")){
				alert("Caso a hora inicio esteja entre 18:00 e 23:59 a hora fim deve ser no máximo 00:00");
				return false;
			} else if(isHoraInicialMenorHoraFinal("00:01", Inicial) 
				   && isHoraInicialMenorHoraFinal(Inicial, "05:59")
				   && !isHoraInicialMenorHoraFinal(Final,"06:01")){
				alert("Caso a hora inicio esteja entre 00:00 e 05:59 a hora fim deve ser no máximo 06:00");
				return false;
            }
            */
		}
		
		var hrHorario = diferencaHoras(Inicial, Final);
        var hrTotal = diferencaHoras(Desconto,somaHora(hrHorario, Translado));
        if (hrTotal.substring(1, 1) != '-'){
            $("#total").val(hrTotal);		
        }	
}
$(document).ready(function(){
    $('input').keypress(function(e){
		var code = null;
		code = (e.keyCode ? e.keyCode : e.which);
		return (code == 13) ? false : true;
    });
});