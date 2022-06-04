<!-- view(novacidade) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Cadastrar Nova Cidade <small><a href="#" data-toggle="modal" data-target="#novaCidade">[?]</a></small></h3>
			</div>
			<hr>
			<div class="card mb-3">
				<div class="card-header">
					<span><i class="fab fa-wpforms"></i> Formulário de Cadastro de Nova Cidade para vinculação a contatos</span>
				</div>
				<div class="card-body">
					<div id="result_nova_cidade" class="my-1">
						<!-- html result -->
					</div>
					<form id="form_cidade" name="form_cidade" enctype="multipart/form-data" method="POST">
						<div class="form-group">
							<label for="cidade" class="form-label">Cidade</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-city"></i></span>
								</div>
								<input type="text" name="cidade" class="form-control" autocomplete="off" autofocus="on" placeholder="Cidade" id="cidade"/>
							</div>
							<span class="text-muted">*Obrgatório</span>
						</div>
						<div class="form-group">
							<label for="id_estado" class="form-label">Estado(UF)</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-flag-usa"></i></span>
								</div>
								<select name="id_estado" class="form-control" onautocomplete id="id_estado">
									<option value="" selected="selected">SELECIONE</option>
									<?php foreach($estados as $estado): ?>
									<option value="<?=$estado["id"];?>"><?=$estado["estado"];?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<span class="text-muted">*Obrigatório</span>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal info -->
<div class="modal fade" id="novaCidade" tabindex="-1" role="dialog" aria-labelledby="MyModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" id="heading">
				<h5 class="modal-title" aria-labelledby="heading">Informações</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info my-0" role="alert">
					User está funcionalidade foi desenvolvida para que você possa realizar novos cadastros específicos relacionadas a cidades referentes a seus devidos estados para obter vinculação a contatos.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>