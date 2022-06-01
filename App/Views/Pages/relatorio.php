<!-- view(relatorio) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Gerar Relatório <small><a href="#" data-toggle="modal" data-target="#relatorio">[?]</a></small></h3>
			</div>
			<hr>
			<div class="card mb-3">
				<div class="card-header">
					<span><i class="fas fa-file"></i> Relatórios de Contatos</span>
				</div>
				<div class="card-body">
					<form target="_blank" method="POST" action="<?=BASE_URL;?>relatorio/gerar">
						<div class="form-group">
							<label for="id_estado" class="form-label">Estado(UF)</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-flag-usa"></i></span>
								</div>
								<select name="id_estado" class="form-control" onautocomplete required>
									<option value="" selected="selected">SELECIONE</option>
									<?php foreach($estados as $estado): ?>
									<option value="<?=$estado["id"];?>"><?=$estado["estado"];?></option>
									<?php endforeach; ?>
									<option value="TODOS">TODOS</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="font" class="form-label">Estilo de Fonte</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-font"></i></span>
								</div>
								<select name="font" class="form-control" onautocomplete required>
									<option value="" selected="selected">SELECIONE</option>
									<option value="Arial">Arial</option>
									<option value="Tahoma">Tahoma</option>
									<option value="Verdana">Verdana</option>
									<option value="Sans-Serif">Sans-Serif</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="folha" class="form-label">Formato de Folha</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
								</div>
								<select name="folha" class="form-control" onautocomplete required>
									<option value="" selected="selected">SELECIONE</option>
									<option value="A4">A4</option>
									<option value="A5">A5</option>
									<option value="A6">A6</option>
									<option value="A7">A7</option>
									<option value="A8">A8</option>
									<option value="A9">A9</option>
									<option value="A10">A10</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="estilo_folha" class="form-label">Estilo de Folha</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-adjust"></i></span>
								</div>
								<select name="estilo_folha" class="form-control" onautocomplete required>
									<option value="" selected="selected">SELECIONE</option>
									<option value="portrat">Portrat</option>
									<option value="landscape">Landscape</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="forma_acesso" class="form-label">Como deseja acessar</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-file-alt"></i></span>
								</div>
								<select name="forma_acesso" class="form-control" onautocomplete required>
									<option value="" selected="selected">SELECIONE</option>
									<option value="pdf-navegador">PDF no Navegador</option>
									<option value="pdf-download">PDF em Download</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block p-2">Gerar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal info -->
<div class="modal fade" id="relatorio" tabindex="-1" role="dialog" aria-labelledby="MyModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" id="heading">
				<h5 class="modal-title" aria-labelledby="heading">Informações</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info my-0" role="alert">
					user está funcionalidade foi desenvolvida para que você possa obter relatórios contendo informações úteis e precisas em relação a seus principais contatos cadastrados diante sua agenda.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>