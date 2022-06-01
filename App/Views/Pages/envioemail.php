<!-- view(envioemail) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Enviar E-Mail <small><a href="#" data-toggle="modal" data-target="#envioEmail">[?]</a></small></h3>
			</div>
			<hr>
			<div class="card mb-3">
				<div class="card-header">
					<span><i class="fab fa-wpforms"></i> Formulário de envio de E-Mail para contato</span>
				</div>
				<div class="card-body">
					<div id="result_mail" class="my-1">
						<!-- html result -->
					</div>
					<form id="form_mail" name="form_mail" enctype="multipart/form-data" method="POST">
						<div class="form-group">
							<label for="email_destino" class="form-label">E-Mail Destinatario</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-at"></i></span>
								</div>
								<input type="email" name="email_destino" class="form-control" autocomplete="off" value="<?=$email_contato;?>" id="email_destino"/>
							</div>
						</div>
						<div class="form-group">
							<label for="assunto" class="form-label">Assunto</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
								</div>
								<input type="text" name="assunto" class="form-control" autocomplete="off" autofocus="on" placeholder="Assunto" id="assunto"/>
							</div>
						</div>
						<div class="form-group">
							<label for="mensagem" class="form-label">Mensagem</label>
							<textarea name="mensagem" rows="6" class="form-control" autocomplete="off" tabindex="on" placeholder="Mensagem" id="mensagem"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>