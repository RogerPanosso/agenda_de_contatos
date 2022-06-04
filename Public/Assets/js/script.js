//function resetForm
function resetForm() {

	let info = confirm("Tem certeza de que deseja cancelar ?");
	if(info == true) {
		$("#result_novo").show("slow").html("<span>Cancelando...</span>");
		setTimeout(function(){
			$("#result_novo").html("");
			$("#form_novo").find("#cancelar").html("Ok Cancelado");
			setTimeout(function(){
				document.querySelector("#form_novo").reset();	
				$("#form_novo").find("#cancelar").html("Cancelar");
			}, 2000);
		}, 3000);
	}

}

//function getIdEstado(recuperando id de estado selecionado em option)
function getIdEstado(valor) {

	let id_estado = valor.value;
	if(id_estado != "") {
		$.ajax({
			type:"POST",
			url:base_url+"ajaxcidades/getCidades",
			dataType:"json",
			data:{id_estado:id_estado},
			success:function(json) {

				if(json != "") {

					let html = "";
					html += "<option value='' selected='selected'>SELECIONE</option>";
					for(let i in json) {
						html += "<option value="+json[i].cidade+">"+json[i].cidade+"</option>";
					}
					$("#form_novo, #form_save").find("#cidades").html(html);

				}

			},
			error:function(response) {

				console.log(response);

			}
		});
	}

}

//realiza aplicação de mascara(mask) em inputs
$("#form_novo").find("#telefone").mask("(00) 0000-0000");
$("#form_novo").find("#celular").mask("(00) 00000-0000");
$("#form_save").find("#telefone").mask("(00) 0000-0000");
$("#form_save").find("#celular").mask("(00) 00000-0000");

$(document).ready(function(){

	//ativa dataTable(Plugin jQuery)
	$("#dataTable").DataTable({
		"language":{
			"lengthMenu":"Mostrando _MENU_ registros por páginas",
			"search":"Buscar",
			"zeroRecords":"Não foram econtrados nenhum registro",
			"infoEmpty":"Não foram econtrados nenhum registro",
			"info":"Mostrando página _PAGE_ de um total de _PAGES_ páginas(Filtrando de um total de _MAX_ registros)",
			"paginate":{
				"previous":"Anterior",
				"next":"Próximo"
			}
		}
	});

	$("#form_novo").find("#cadastrar, #cancelar").on("focus", function(event){
		$(this).css("border", "1px solid #006600");
		$(this).animate({
			opacity: 1,
			fontSize: 18,
			transition: ".1s"
		}, "fast");
	});

	$("#form_novo").find("#cadastrar, #cancelar").on("blur", function(event){
		$(this).css("border", "");
		$(this).css("transition", "all ease .1s");
		$(this).animate({
			opacity: 1,
			fontSize: 16,
			transition: ".1s"
		}, "fast");
	});

	//manipulação em form de cadastro
	$("#form_novo").on("submit", function(event){
		event.preventDefault();
		let tipo_evento = event.type;
		let elemento = event.target;
		if(tipo_evento == "submit") {
			let form = $("form")[0];
			let formName = $("form")[0].name;
			let formData = $("#form_novo").serialize();
			if(formData != "") {
				$.ajax({
					type:"POST",
					url:base_url + "ajaxnovocontato/salvarContato",
					dataType:"json",
					data:formData,
					beforeSend:function() {

						$("#result_novo").fadeIn("slow").html("<span>Cadastrando...</span>")

					},
					success:function(json) {

						let html = "";
						let color = "";

						if(json.return == "dados null") {

							window.alert("Por favor preencha todos os campos obrigatórios");

						}else if(json.return == "success") {

							html += "<i class='fas fa-check'></i> Contato Cadastrado com Sucesso";
							color += "text-success";
							setTimeout(function(){
								document.querySelector("#form_novo").reset();
							}, 2000);

						}else if(json.return == "exist") {

							html += "<i class='fas fa-info'></i> E-Mail, Telefone ou Celular informado já existente diante contato";
							color += "text-danger";

						}

						$("#result_novo").show("fast").html("<span class="+color+">"+html+"</span>");

						$("#result_novo").animate({
							opacity: 1,
							fontSize: 16,
							transition: ".1s"
						}, "fast");

						setTimeout(function(){
							$("#result_novo").hide("slow");
							$("#form_novo").find("#cadastrar").trigger("blur");
						}, 5000);

					},
					error:function(response) {

						console.log(response);

					}
				});
			}
		}
	});

	//manipulação em form de edição
	$("#form_save").on("submit", function(event){
		event.preventDefault();
		let tipo_evento = event.type;
		let elemento = event.target;
		if(tipo_evento == "submit") {
			let form = $("form")[0];
			let formName = $("form")[0].name;
			let formData = $("#form_save").serialize();
			if(formData != "") {
				$.ajax({
					type:"POST",
					url:base_url+"ajaxeditarcontato/editar",
					dataType:"json",
					data:formData,
					beforeSend:function() {

						$("#result_save").show("fast").html("<span>Salvando...</span>");

					},
					success:function(json) {

						let html = "";
						let color = "";

						if(json.return == "dados null") {

							window.alert("Por favor todos os campos devem ser preenchidos");

						}else if(json.return == "success") {

							html += "<i class='fas fa-check'></i> Contato Salvo com Sucesso";
							color += "text-success";

						}else if(json.return == "error") {

							html += "<i class='fas fa-triangule-exclamation'></i> Falha ao salvar dados :/";
							color += "text-danger";

						}

						$("#result_save").show("fast").html("<span class="+color+">"+html+"</span>");

						$("#result_save").animate({
							opacity: 1,
							fontSize: 16,
							transition: ".1s"
						}, "fast");

						setTimeout(function(){
							$("#result_save").hide("slow");
						}, 5000);

					},
					error:function(response) {

						console.log(response);

					}
				});
			}
		}
	});	

	//exclusão de cadastro de contato
	$(document).on("click", ".excluir", function(event){
		event.preventDefault();
		let info = confirm("Tem certeza de que deseja excluir este contato ?");
		let id = parseInt($(this).attr("data-id"));
		if(info == true && id != "") {
			$.ajax({
				type:"POST",
				url:base_url+"home/excluir/"+id,
				dataType:"json",
				data:{id:id},
				success:function(json) {

					if(json.return == "success") {

						$("#result_del").show("fast").html("<span class='text-danger'><i class='fas fa-times'></i> Contato excluído com sucesso</span>");
						$("#result_del").animate({
							opacity: 1,
							fontSize: 16,
							transition: ".1s"
						}, "fast");

						setTimeout(function(){
							$("#result_del").hide("slow");
							setTimeout(function(){
								window.location.reload();
							}, 2000);
						}, 5000);

					}

				},
				error:function(response) {

					console.log(response);

				}
			});
		}
	});

	//manipulação em form de email
	$("#form_mail").on("submit", function(event){
		event.preventDefault();
		let tipo_evento = event.type;
		let elemento = event.target;
		if(tipo_evento == "submit") {
			let form = $("form")[0];
			let formName = $("form")[0].name;
			let formData = $("#form_mail").serialize();
			if(formData != "" && $.type(formData) == "string") {
				$.ajax({
					type:"POST",
					url:base_url+"ajaxenvioemail/enviar",
					dataType:"json",
					data:formData,
					beforeSend:function() {

						$("#result_mail").fadeIn("fast").html("<span>Enviando...</span>");

					},
					success:function(json) {

						if(json.return == "dados null") {

							window.alert("Por favor preencha todos os campos");

						}else if(json.return == "success") {

							$("#result_mail").show("fast").html("<span class='text-success'><i class='fas fa-check'></i> E-Mail enviado com sucesso</span>");

						}else if(json.return == "erro") {

							window.alert("Falha ao realizar envio: " + json.info);

						}

						$("#result_mail").animate({
							opacity: 1,
							fontSize: 16,
							transition: ".1s"
						}, "fast");

						setTimeout(function(){
							$("#result_mail").hide("slow");
							document.querySelector("#form_mail").reset();
						}, 5000);

					},
					error:function(response) {

						console.log(response);

					}
				});
			}
		}
	});

	//manipulação em form de cadastro(Cidades)
	$("#form_cidade").on("submit", function(event){
		event.preventDefault();
		let tipo_evento = event.type;
		let elemento = event.target;
		if(tipo_evento == "submit") {
			let form = $("form")[0];
			let formName = $("form")[0].name;
			let formData = $("#form_cidade").serialize();
			if(formData != "") {
				$.ajax({
					type:"POST",
					url:base_url+"ajaxnovacidade/salvarCidade",
					dataType:"json",
					data:formData,
					beforeSend:function() {

						$("#result_nova_cidade").show("fast").html("<span>Cadastrando...</span>");

					},
					success:function(json) {

						let html = "";
						let color = "";

						if(json.return == "dados null") {

							window.alert("Por favor preencha todos os campos obrigatórios");

						}else if(json.return == "success") {

							html += "<i class='fas fa-check'></i> Cidade Cadastrada com Sucesso";
							color += "text-success";

							setTimeout(function(){
								document.querySelector("#form_cidade").reset();
							}, 2000);

						}else if(json.return == "exist") {

							html += "<i class='fas fa-info'></i> Cidade já cadastrada diante estado";
							html += "text-danger";

						}

						$("#result_nova_cidade").show("fast").html("<span class="+color+">"+html+"</span>");

						$("#result_nova_cidade").animate({
							opacity: 1,
							fontSize: 18,
							transition: ".1s"
						}, "fast");

						setTimeout(function(){
							$("#result_nova_cidade").hide("slow");
						}, 5000);

					},
					error:function(response) {

						console.log(response);

					}
				});
			}
		}
	});

});