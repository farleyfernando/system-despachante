document.addEventListener('DOMContentLoaded', function() {
	var initialLocaleCode = 'pt-br';
	var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		headerToolbar: {
			left: 'prevYear,prev,next,nextYear today',
			center: 'title',
			right: 'dayGridMonth,dayGridWeek,dayGridDay'
		},
		//initialDate: '2021',
		locale: initialLocaleCode,
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		dayMaxEvents: true, // allow "more" link when too many events

		events: 'eventos.php',
		extraParams: function () {
			return {
				cachebuster: new Date().valueOf()
			};
		},
		eventClick: function(info) {
			$("#apagar").attr("href", "calendario/del?id=" + info.event.id);
			info.jsEvent.preventDefault();
			$('#visualizar #id').text(info.event.id);
			$('#visualizar #id').val(info.event.id);
			$('#visualizar #title').text(info.event.title);
			$('#visualizar #title').val(info.event.title);
			$('#visualizar #start').text(info.event.start.toLocaleString());
			$('#visualizar #start').val(info.event.start.toLocaleString());
			$('#visualizar #end').text(info.event.end.toLocaleString());
			$('#visualizar #end').val(info.event.end.toLocaleString());
			$('#visualizar #color').val(info.event.backgroundColor);
			$('#visualizar').modal('show');
		},
		selectable: true,
		select: function (info){
			//alert('Inicio do Evento ' + info.start.toLocaleString());
			$('#cadastrar #start').val(info.start.toLocaleString());
			$('#cadastrar #end').val(info.end.toLocaleString());
			$('#cadastrar').modal('show');
		}

	});

	calendar.render();

});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
	var keypress = (window.event) ? event.keyCode : evento.which;
	campo = eval(objeto);
	if (campo.value == '00/00/0000 00:00:00') {
		campo.value = "";
	}

	caracteres = '0123456789';
	separacao1 = '/';
	separacao2 = ' ';
	separacao3 = ':';
	conjunto1 = 2;
	conjunto2 = 5;
	conjunto3 = 10;
	conjunto4 = 13;
	conjunto5 = 16;
	if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
		if (campo.value.length == conjunto1)
			campo.value = campo.value + separacao1;
		else if (campo.value.length == conjunto2)
			campo.value = campo.value + separacao1;
		else if (campo.value.length == conjunto3)
			campo.value = campo.value + separacao2;
		else if (campo.value.length == conjunto4)
			campo.value = campo.value + separacao3;
		else if (campo.value.length == conjunto5)
			campo.value = campo.value + separacao3;
	} else {
		event.returnValue = false;
	}
}

$(document).ready(function() {
	$("#addevent").on("submit", function(events) {
		events.preventDefault();
		$.ajax({
			method: "POST",
			url: "cad_event.php",
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function(retorna) {
				if (retorna['sit']) {
					//$("#msg-cad").html(retorna['msg']);
					location.reload();
				} else {
					$("#msg-cad").html(retorna['msg']);
				}
			}
		})
	});

	$('.btn-canc-vis').on("click", function () {
		$('.visevent').slideToggle();
		$('.formedit').slideToggle();

	});
	$('.btn-canc-edit').on("click", function () {
		$('.formedit').slideToggle();
		$('.visevent').slideToggle();

	});

	$("#editevent").on("submit", function(events) {
		events.preventDefault();
		$.ajax({
			method: "POST",
			url: "edit_event.php",
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function(retorna) {
				if (retorna['sit']) {
					//$("#msg-cad").html(retorna['msg']);
					location.reload();
				} else {
					$("#msg-edit").html(retorna['msg']);
				}
			}
		})
	});
});

